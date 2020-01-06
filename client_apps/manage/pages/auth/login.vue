<template id="login">
    <v-card class="elevation-1 pa-3">
        <v-form @submit.prevent="login">
            <v-card-text>
                <div class="layout column align-center">
                    <img src="/manage/icons/sign.svg" alt="Vue Material Admin" width="180" height="180">
                    <h1 class="flex my-4 primary--text">Планета Авто</h1>
                </div>

                <v-text-field
                        append-icon="person"
                        name="login"
                        type="text"
                        label="Логин"
                        v-model="form.email"
                        :error="form.errors.has('email')"
                        :rules="form.errors.only('email')"/>
                <v-text-field
                        :type="hidePassword ? 'password' : 'text'"
                        :append-icon="hidePassword ? 'visibility_off' : 'visibility'"
                        name="password"
                        label="Пароль"
                        id="password"
                        :rules="form.errors.only('password')"
                        v-model="form.password"
                        :error="form.errors.has('password')"
                        @click:append="hidePassword = !hidePassword"/>

            </v-card-text>
            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn type="submit" block color="primary" :loading="form.busy">Авторизация</v-btn>
            </v-card-actions>
        </v-form>
    </v-card>
</template>

<script>
    import Form from 'vform'

    export default {
        layout: 'auth',
        head() {
            return {title: 'Авторизация'}
        },

        data: () => ({
            hidePassword: true,
            form: new Form({
                email: '',
                password: '',
            }),
            remember: false
        }),

        methods: {
            async login() {
                // Submit the form.
                try {
                    await this.form.post('/auth/login');
                    await this.$auth.loginWith('local', {
                        data: {
                            "email": this.form.email,
                            "password": this.form.password
                        }
                    });
                    window.location = process.env.manageUrl;
                } catch (e) {

                }
            }
        }
    }
</script>


<style scoped lang="css">
    #login {
        height: 50%;
        width: 100%;
        position: absolute;
        top: 0;
        left: 0;
        content: "";
        z-index: 0;
    }
</style>

