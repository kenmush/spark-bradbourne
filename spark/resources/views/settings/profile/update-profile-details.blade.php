<spark-update-profile-details :user="user" inline-template>
    <div class="panel panel-default">
        <div class="panel-heading">{{__('Profile Details')}}</div>

        <div class="panel-body">
            <!-- Success Message -->
            <div class="alert alert-success" v-if="form.successful">
            {{__('Your profile has been updated!')}}
            </div>

            <form class="form-horizontal" role="form">
                <!-- Age -->
                <div class="form-group" :class="{'has-error': form.errors.has('age')}">
                    <label class="col-md-4 control-label">{{__('Age')}}</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="age" v-model="form.age">

                        <span class="help-block" v-show="form.errors.has('age')">
                            @{{ form.errors.get('age') }}
                        </span>
                    </div>
                </div>

                <!-- Update Button -->
                <div class="form-group">
                    <div class="col-md-offset-4 col-md-6">
                        <!-- <button type="submit" class="btn btn-primary"
                                @click.prevent="update"
                                :disabled="form.busy">

                                {{__('Update')}}
                        </button> -->
                    </div>
                </div>
            </form>
        </div>
    </div>
</spark-update-profile-details>