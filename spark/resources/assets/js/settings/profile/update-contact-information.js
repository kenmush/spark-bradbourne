module.exports = {
    props: ['user'],

    /**
     * The component's data.
     */
    data() {
        return {
            form: $.extend(true, new SparkForm({
                name: '',
                email: '',
                type:'',
                category:'',
            }), Spark.forms.updateContactInformation)
        };
    },


    /**
     * Bootstrap the component.
     */
    mounted() {
        this.form.name = this.user.name;
        this.form.email = this.user.email;
        this.form.type = this.user.type;
        this.form.category = this.user.category;
    },


    methods: {
        /**
         * Update the user's contact information.
         */
        update() {
            Spark.put('/settings/contact', this.form)
                .then(() => {
                    Bus.$emit('updateUser');
                });
        }
    }
};
