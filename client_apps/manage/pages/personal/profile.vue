<template>
    <div>
        <v-card>
            <v-form @submit.prevent="update" @keydown="form.onKeydown($event)">
                <v-alert
                        :value="updated"
                        type="success"
                >
                    Данные обновлены
                </v-alert>

                <v-card-text>
                    <v-text-field
                            name="name"
                            type="text"
                            label="Имя"
                            v-model="form.name"
                            :error="form.errors.has('name')"
                            :rules="form.errors.only('name')"/>

                    <v-text-field
                            name="email"
                            type="text"
                            label="E-Mail"
                            v-model="form.email"
                            :error="form.errors.has('email')"
                            :rules="form.errors.only('email')"/>
                </v-card-text>

                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn :loading="form.busy" color="primary" type="submit">Обновить</v-btn>
                </v-card-actions>
            </v-form>
        </v-card>
    </div>

</template>

<script>
    import Form from 'vform'

    const pageTitle = 'Профиль';
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
                name: '',
                email: ''
            }),
            updated: false
        }),

        created() {
            // Fill the form with user data.
            this.form.keys().forEach(key => {
                this.form[key] = this.$auth.user[key];
            })
        },

        methods: {
            async update() {
                try {
                    const {data} = await this.form.patch('/manage/personal/profile');
                    this.$auth.fetchUser();
                    this.updated = true;
                } catch (e) {

                }
            }
        }
    }
</script>
