<template>

  <section class="section">
    <h2 class="title is-4">Subscribe to newsletter</h2>
    <div class="content">
      <form method="post" action="/api/newsletter">
        <div class="field">
          <label class="label accessibly-hidden">Email</label>
          <div class="control has-icons-left">
            <input class="input" type="text" placeholder="Your email" required>
            <span class="icon is-small is-left">
              <i class="fa fa-envelope"></i>
            </span>
          </div>
        </div>
        <div class="control">
          <button class="button is-primary">Subscribe</button>
        </div>
      </form>
    </div>
  </section>

</template>