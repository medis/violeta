<template>

  <div class="page contact">
    <small-hero>Contact</small-hero>
    <div class="container">
      <section class="section">
        <form method="post" action="/api/contact" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">

          <div class="columns">
            <div class="column">
              <div class="field">
                <label class="label accessibly-hidden">Name</label>
                <div class="control has-icons-left">
                  <input class="input" type="text" placeholder="Name" name="name" v-model="form.name" required>
                  <span class="icon is-small is-left">
                    <i class="fa fa-user"></i>
                  </span>
                  <span class="help is-danger" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></span>
                </div>
              </div>
            </div>

            <div class="column">
              <div class="field">
                <label class="label accessibly-hidden">Email</label>
                <div class="control has-icons-left">
                  <input class="input" type="text" name="email" placeholder="Email" v-model="form.email" required>
                  <span class="icon is-small is-left">
                    <i class="fa fa-envelope"></i>
                  </span>
                  <span class="help is-danger" v-if="form.errors.has('email')" v-text="form.errors.get('email')"></span>
                </div>
              </div>
            </div>
          </div>

          <div class="field">
            <label class="label accessibly-hidden">Message</label>
            <div class="control">
              <textarea class="textarea" name="message" placeholder="Message" v-model="form.message" required></textarea>
              <span class="help is-danger" v-if="form.errors.has('message')" v-text="form.errors.get('message')"></span>
            </div>
          </div>

          <div class="field is-hidden">
            <label class="label accessibly-hidden">I agree to terms of service</label>
            <div class="control">
              <input type="checkbox" name="term_of_service" v-model="form.term_of_service" />
            </div>
          </div>

          <div class="control">
            <button class="button is-primary" :class="button_class">Send</button>
          </div>
        </form>
      </section>
    </div>
  </div>

</template>

<script>
  Vue.component('smallHero', require('../elements/smallHero.vue'));

  import Form from '../../form';

  export default {
    data() {
      return {
        form: new Form({
          email: '',
          name: '',
          message: '',
          term_of_service: false
        }),
        button_class: ''
      }
    },

    methods: {
      onSubmit() {
        this.button_class = 'is-loading';
        this.form.post('/api/contact')
          .then(response => this.onSuccess())
          .catch(error => this.button_class = '');
      },

      onSuccess() {
        this.button_class = '';
        this.showSubscribeSuccess()
      }
    },

    notifications: {
      showSubscribeSuccess: {
        title: '',
        message: 'Message sent',
        type: 'success'
      }
    },
  }

</script>
