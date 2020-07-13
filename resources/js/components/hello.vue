
<template>

	<div class="session-wrapper">
		<div class="session-left" >
			<session-slider-widget></session-slider-widget>
		</div>
		<div class="session-right text-center">
			<div class="session-table-cell">
				<div class="session-content">
					<img 
						:src="appLogo"
						class="img-responsive mb-4" 
						width="78" 
						height="78" 
					/>
					<h2 class="mb-4">Login to Spark Bradbourne</h2>
					<p class="fs-14">Enter username and password to access control panel.</p>
				    <v-form v-model="valid"  method="post" action="/login" class="">
						<input type="hidden" name="_token" v-bind:value="csrf">
						<v-text-field 
							label="E-mail ID"
							name="email"  
							v-model="email" 
							:rules="emailRules" 
							required
						></v-text-field>
						<v-text-field 
							label="Password" 
							 name="password"
							v-model="password" 
							type="password" 
							:rules="passwordRules" 
							required
						></v-text-field>
						<v-checkbox 
							color="primary" 
							label="Remember me" 
							name="remember"	
							v-model="checkbox"
						></v-checkbox>
						<a class="mb-2" href="/password/reset">Forgot Password?</a>
						<div>
							<v-btn large type="submit" block color="primary"  style="background-color:#5d92f4 !important" class="mb-2">Login Now</v-btn>
							<v-btn large @click="onCreateAccountconsumer" block color="warning" style="background-color:#ffb70f !important" class="mb-2">Create Account as Consumer</v-btn>
							<v-btn large @click="onCreateAccountsupplier" block color="warning" style="background-color:rgb(237, 121, 39) !important" class="mb-2">Create Account as Supplier </v-btn>
						</div>
						<p>By signing up you agree to Bradbourne</p>
						<a href="">Terms of Service</a>
					</v-form>
					<p> Login with</p>
					<div class="session-social-links d-inline-block">
						<ul class="list-unstyled mb-2">
							<li >
								<a href="/redirect">
								<span class="facebook-bg session-icon">
									<i class="ti-facebook"></i>
								</span>
								</a>
							</li>
							<!-- <li @click="signInWithGoogle">
								<span class="google-bg session-icon">
									<i class="ti-google"></i>
								</span>
							</li>
							<li @click="signInWithTwitter">
								<span class="twitter-bg session-icon">
									<i class="ti-twitter-alt"></i>
								</span>
							</li>
							<li @click="signInWithGithub">
								<span class="github-bg session-icon">
									<i class="ti-github"></i>
								</span>
							</li> -->
						</ul>
						<!-- <v-btn 
							color="error" 
							@click="signinWithAuth0"
						>
							Signin With Auth0
						</v-btn> -->
					</div>
				</div>
			</div>
		</div>
	</div>
</template>


<script>
import SessionSliderWidget from "./SessionSlider";

export default {
	props: ['csrf', 'oldName'],
	
      components: {
    SessionSliderWidget
  },
  data() {
    return {
      checkbox: false,
      valid: false,
      emailRules: [
        v => !!v || "E-mail is required",
        v =>
          /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(v) ||
          "E-mail must be valid"
      ],
      passwordRules: [v => !!v || "Password is required"],
      appLogo: "https://lirp-cdn.multiscreensite.com/7253b271/dms3rep/multi/opt/Transparent+Logo+For+White+Background-640w.png",
      brand: ''
    };
  },
  methods: {
    submit() {
      const user = {
        email: this.email,
        password: this.password
			};
			
      this.$store.dispatch("signinUserInFirebase", {
        user
      });
	},
	loginAccount(){
		axios.get('/login');
	},
	signInWithFacebook() {
	//   this.$store.dispatch("signinUserWithFacebook");
	return redirect('/redirect');
    },
    signInWithGoogle() {
      this.$store.dispatch("signinUserWithGoogle");
    },
    signInWithTwitter() {
      this.$store.dispatch("signinUserWithTwitter");
    },
    signInWithGithub() {
      this.$store.dispatch("signinUserWithGithub");
    },
    onCreateAccountconsumer() {
	//   this.$router.push("/register");
	//   return redirect('/register');
	window.location.href = '/register?type=consumer&category=null';
	},
	 onCreateAccountsupplier() {
	//   this.$router.push("/register");
	//   return redirect('/register');
	window.location.href = '/register?type=supplier&category=1';
	},
	
    signinWithAuth0() {
      login();
    }
  },
    mounted() {
        console.log('Component mounted')
		}
		
		
	}
	

</script>
