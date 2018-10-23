<template>
  <footer class="footer">
    <div class="container">
      <div class="content has-text-centered">
        <p class="spotify-follow">
          <iframe src="https://open.spotify.com/follow/1/?uri=spotify:artist:37ejdU331mtt2i5obvvWsz&size=detail&theme=light" width="300" height="56" scrolling="no" frameborder="0" style="border:none; overflow:hidden;" allowtransparency="true"></iframe>
        </p>
        <p>
          Violeta Skya
          <span class="icon is-small"><i class="fa fa-copyright" aria-hidden="true"></i></span>
          {{ new Date().getFullYear() }}
        </p>

        <p>For bookings / enquiries please contact <router-link to="/contact">here</router-link></p>

        <p class="has-text-right-tablet is-size-7">
          Site developed and maintained by <a href="http://audrius.io" target="_blank">audrius.io</a>
        </p>
      </div>
    </div>
  </footer>
</template>
