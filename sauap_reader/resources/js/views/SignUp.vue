<template>
  <div class="wrapper wrapper-authorization">

    <colored-header 
      title="Тіркелу" 
      :Profile="false" 
      goTo="catalog"
    />

    <div class="authorization__group">

      <div class="logo">
        <img src="/img/book_tree.svg" alt="">
      </div>

      <form class="authorization" @submit.prevent="signup">
        <div class="authorization__input-group">
          <input 
            required 
            type="text" 
            v-model="username" 
            :placeholder="placeholders.username" 
          />
          <input 
            required 
            type="text" 
            v-model="email" 
            :placeholder="placeholders.email" 
          />  
          <input
            required
            type="password"
            v-model="password"
            :placeholder="placeholders.password"
          />
          <input
            required
            type="password"
            v-model="password"
            :placeholder="placeholders.password_repeat"
          />
        </div>
      
        <div class="authorization__button-group">
          <button class="authorization__button font-weight-bold" type="submit">{{placeholders.signup_text}}</button>
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
    name: "SignUp",
    data() {
      return { 
        username: "", 
        password: "", 
        email: "", 
        signedInCheckbox: false,
        placeholders: {
          password: 'Құпия сөз',
          password_repeat: 'Құпия сөзді қайталау',
          email: 'Электронды почта',
          username: 'Пайдаланушы аты',
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
      
      signup(e) {
        if( !this.checkForm(e) ) 
          return

        this.$store.dispatch("signupUser", {
          name: this.username,
          email: this.email,
          password: this.password,
        }).then(
          response => this.$router.push('/profile'),
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