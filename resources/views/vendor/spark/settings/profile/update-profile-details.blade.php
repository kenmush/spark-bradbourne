<spark-update-profile-details :user="user" inline-template>
    <div class="card card-default">
        <div class="card-header">{{__('Profile Details')}}</div>

        <div class="card-body">
            <!-- Success Message -->
            <div class="alert alert-success" v-if="form.successful">
                {{__('Your profile has been updated!')}}
            </div>

            <form role="form">
              
                <!-- Update Button -->
                <!-- <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary"
                                @click.prevent="update"
                                :disabled="form.busy">

                            {{__('Update')}}
                        </button>
                    </div>
                </div> -->
            </form>
        </div>
    </div>


</spark-update-profile-details>