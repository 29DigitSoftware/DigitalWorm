<template>
  <div class="wrapper wrapper-authorization">

    <colored-header 
      title="Логин" 
      :Profile="false" 
    />

    <div class="authorization__group">

      <div class="logo">
        <img src="/img/book_tree.svg" alt="">
      </div>

      <form 
        class="authorization" 
        @submit.prevent="login"
        @action="login"
      >
        <div class="authorization__input-group">

          <input
            required
            type="text"
            v-model="email"
            name="email"
            :placeholder="placeholders.email"
          />
           <input
            required
            type="password"
            v-model="password"
            name="password"
            :placeholder="placeholders.password"
          />
          <a href="#" class="font-weight-bold" >{{placeholders.forget_password_text}}</a>
        </div>
      
        <div class="authorization__button-group">
          <button class="authorization__button font-weight-bold" type="submit">{{placeholders.login_text}}</button>
          <button class="authorization__button font-weight-bold white_bg" @click="$router.push('signup')" type="button" >{{placeholders.signup_text}}</button>
        </div>
        
      </form>

      <div class="errors" v-if="errors.length">
        <ul>
          <li v-for="error in errors" :key='error'>
            {{ error }}
          </li>
        </ul>
      </div>

    </div>    
  </div>

</template>

<script>
  import ColoredHeader from '../components/colored-header'
  import {mapGetters, mapMutations} from 'vuex'

  export default {
    name: "Login",
    data() {
      return {
        email: null,
        password: null,
        placeholders: {
          password: 'Құпия сөз',
          password_repeat: 'Құпия сөзді қайталау',
          forget_password_text: 'Құпия сөзді ұмытсаңыз',
          email: 'Электронды почта',
          username: 'Пайдаланушы аты',
          login_text: 'Login',
          signup_text: 'Тіркелу',
        },

      };
    },
    mounted(){
      this.resetErrors();
    },

    computed: {
      ...mapGetters(['errors']),
    },

    components: {
      ColoredHeader,
    },

    methods: {
      ...mapMutations(['resetErrors', 'addErrorMessage']),

      login(e) {
        if( !this.checkForm(e) ) 
          return

        console.log('hello')
        e.target.reset();

        this.$store.dispatch('retrieveToken', {
          email: this.email,
          password: this.password
        }).then(
          response => this.$router.push('/catalog'),
          error => console.log("Rejected: " + error.message)
        )
      },
      checkForm(e) {

        this.resetErrors();

        if (!this.password) {
          this.addErrorMessage('password required.');
        } 
        else if (!this.validEmail(this.email)) {
          this.addErrorMessage('Valid email required.');
        }

        if (!this.errors.length) {
          return true;
        }
        else{
          e.preventDefault();
          return false;
        }

      },
      validEmail(email) {
        var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
      },
    },
  };
</script>

<style scoped>
  @import '../components/assets/styles/authorization.css';
</style>