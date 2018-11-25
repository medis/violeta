<?php
namespace Deployer;

require 'recipe/laravel.php';

// Configuration

$path = '/var/www/violetaskya';

$live_path = '~/laravel';

set('repository', 'git@github.com:medis/violeta.git');
set('git_tty', true);
add('shared_files', []);
add('shared_dirs', ['public/storage']);
add('writable_dirs', ['storage', 'vendor', 'public/storage']);
set('allow_anonymous_stats', false);

// Hosts

host('audrius.io')
    ->stage('production')
    ->user('deployer')
    ->identityFile('~/.ssh/id_deployex')
    ->set('deploy_path', $path);

// Tasks

desc('Restart PHP-FPM service');
task('php-fpm:restart', function () {
    // The user must have rights for restart service
    // /etc/sudoers: username ALL=NOPASSWD:/bin/systemctl restart php-fpm.service
    run('sudo systemctl restart php7.2-fpm.service');
});
after('deploy:symlink', 'php-fpm:restart');

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

// before('deploy:symlink', 'artisan:migrate');

desc("Update frontend package");
task('update-frontend', function() {
   run('{{bin/php}} {{release_path}}/artisan violetaskya-frontend:update');
});
before('deploy:symlink', 'update-frontend');

desc("Publish contact package configuration");
task('publish-contact', function() {
    run('{{bin/php}} {{release_path}}/artisan violetaskya-contact:publish');
});
before('deploy:symlink', 'publish-contact');

desc("Publish photos package configuration");
task('publish-photos', function() {
    run('{{bin/php}} {{release_path}}/artisan violetaskya-photos-config:publish');
});
before('deploy:symlink', 'publish-photos');