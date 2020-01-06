<template>
    <div>
        <v-card>
            <v-form @submit.prevent="update" @keydown="form.onKeydown($event)">
                <v-alert
                        :value="updated"
                        type="success"
                >
                    Пароль изменен
                </v-alert>

                <v-card-text>
                    <v-text-field
                            name="password"
                            type="password"
                            label="Новый пароль"
                            v-model="form.password"
                            :error="form.errors.has('password')"
                            :rules="form.errors.only('password')"/>
                    <v-text-field
                            name="password_confirmation"
                            type="password"
                            label="Подтвердить пароль"
                            v-model="form.password_confirmation"
                            :error="form.errors.has('password_confirmation')"
                            :rules="form.errors.only('password_confirmation')"/>
                </v-card-text>

                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn type="submit" color="primary" :loading="form.busy">Изменить</v-btn>
                </v-card-actions>
            </v-form>
        </v-card>
    </div>

</template>

<script>
    import Form from 'vform'

    const pageTitle = 'Пароль';
    export default {
        scrollToTop: false,
        head() {
            return {title: pageTitle}
        },
        meta: {
            breadcrumbs: [{text: pageTitle}]
        },

        data: () => ({
            form: new Form({
                password: '',
                password_confirmation: ''
            }),
            updated: false
        }),

        methods: {
            async update() {
                try {
                    await this.form.patch('/manage/personal/password');
                    this.form.reset();
                    this.updated = true;
                } catch (e) {

                }

            }
        }
    }
</script>
