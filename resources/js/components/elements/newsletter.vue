<template>

  <section class="section">
    <h2 class="title is-4">Subscribe to newsletter</h2>
    <div class="content">
      <form method="post" action="/api/newsletter" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
        <div class="field">
          <label class="label accessibly-hidden">Email</label>
          <div class="control has-icons-left">
            <input class="input" type="text" placeholder="Your email" name="email" v-model="form.email" required>
            <span class="icon is-small is-left">
              <i class="fa fa-envelope"></i>
            </span>
            <span class="help is-danger" v-if="form.errors.has('email')" v-text="form.errors.get('email')"></span>
          </div>
        </div>
        <div class="field is-hidden">
          <label class="label accessibly-hidden">I agree to terms of service</label>
          <div class="control">
            <input type="checkbox" name="term_of_service" v-model="form.term_of_service" />
          </div>
        </div>
        <div class="control">
          <button class="button is-primary" :class="button_class">Subscribe</button>
        </div>
      </form>
    </div>
  </section>

</template>

<script>
  import Form from '../../form';

  export default {
    data() {
      return {
        form: new Form({
          email: '',
          term_of_service: ''
        }),
        button_class: ''
      }
    },

    methods: {
      onSubmit() {
        this.button_class = 'is-loading';
        this.form.post('/api/subscribe')
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
        message: 'Thank you for subscribing to newsletter',
        type: 'success'
      }
    },
  }

</script>
