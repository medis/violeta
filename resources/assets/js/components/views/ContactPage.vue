<template>

  <div class="page contact">
    <small-hero>Contact</small-hero>
    <div class="container">
      <section class="section">
        <form method="post" action="/api/contact">

          <div class="columns">
            <div class="column">
              <div class="field">
                <label class="label accessibly-hidden">Name</label>
                <div class="control has-icons-left">
                  <input class="input" type="text" placeholder="Name" required>
                  <span class="icon is-small is-left">
                    <i class="fa fa-user"></i>
                  </span>
                </div>
              </div>
            </div>

            <div class="column">
              <div class="field">
                <label class="label accessibly-hidden">Email</label>
                <div class="control has-icons-left">
                  <input class="input" type="text" placeholder="Email" required>
                  <span class="icon is-small is-left">
                    <i class="fa fa-envelope"></i>
                  </span>
                </div>
              </div>
            </div>
          </div>

          <div class="field">
            <label class="label accessibly-hidden">Message</label>
            <div class="control">
              <textarea class="textarea" placeholder="Message" required></textarea>
            </div>
          </div>

          <div class="control">
            <button class="button is-primary">Send</button>
          </div>
        </form>
      </section>
    </div>
  </div>

</template>

<script>
  Vue.component('smallHero', require('../elements/smallHero.vue'));
</script>
