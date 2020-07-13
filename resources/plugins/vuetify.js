import Vue from 'vue'
import Vuetify from 'vuetify/lib'
// store
// import { store } from '../store/store';


Vue.use(Vuetify)

const opts = {
    theme:{
		themes: {
			// light: store.getters.selectedTheme.theme,
			// dark: store.getters.selectedTheme.theme
		},
	},
}

export default new Vuetify(opts)