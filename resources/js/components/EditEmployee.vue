<template>
    <div class="flex items-center">
        <div class="mt-10 sm:mt-0">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">
                            Employee Information
                        </h3>
                        <p class="mt-1 text-sm text-gray-600">
                            All the available fields for an existing 
                            employee.
                        </p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form @submit.prevent="update">
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-3">
                                        <label
                                            for="first_name"
                                            class="block text-sm font-medium text-gray-700"
                                            >Name</label
                                        >
                                        <input
                                            v-model="form.name"
                                            type="text"
                                            name="name"
                                            id="name"
                                            autocomplete="given-name"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                        />
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label
                                            for="last_name"
                                            class="block text-sm font-medium text-gray-700"
                                            >Phone</label
                                        >
                                        <input
                                            v-model="form.phone"
                                            type="text"
                                            name="phone"
                                            id="phone"
                                            autocomplete="phone"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                        />
                                    </div>

                                    <div class="col-span-6">
                                        <label
                                            for="street_address"
                                            class="block text-sm font-medium text-gray-700"
                                            >Address</label
                                        >
                                        <input
                                            v-model="form.address"
                                            type="text"
                                            name="address"
                                            id="address"
                                            autocomplete="street-address"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                        />
                                    </div>

                                    <div
                                        class="col-span-6 sm:col-span-6 lg:col-span-2"
                                    >
                                        <label
                                            for="city"
                                            class="block text-sm font-medium text-gray-700"
                                            >Salary</label
                                        >
                                        <input
                                            v-model="form.salary"
                                            type="text"
                                            name="salary"
                                            id="salary"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                        />
                                    </div>

                                    <div
                                        class="col-span-6 sm:col-span-3 lg:col-span-2"
                                    >
                                        <label
                                            for="state"
                                            class="block text-sm font-medium text-gray-700"
                                            >Department</label
                                        >
                                        <input
                                            v-model="form.department"
                                            type="text"
                                            name="department"
                                            id="department"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                        />
                                    </div>

                                    <div
                                        class="col-span-6 sm:col-span-3 lg:col-span-2"
                                    >
                                        <label
                                            for="postal_code"
                                            class="block text-sm font-medium text-gray-700"
                                            >Position</label
                                        >
                                        <input
                                            v-model="form.position"
                                            type="text"
                                            name="position"
                                            id="position"
                                            autocomplete="postal-code"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                        />
                                    </div>
                                    <div class="col-span-6">
                                        <label
                                            for="street_address"
                                            class="block text-sm font-medium text-gray-700"
                                            >Hire Date</label
                                        >
                                        <input
                                            v-model="form.hire_date"
                                            type="text"
                                            name="hire_date"
                                            id="hire_date"
                                            autocomplete="street-address"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                        />
                                    </div>
                                </div>
                            </div>
                            <div
                                class="px-4 py-3 bg-gray-50 text-right sm:px-6"
                            >
                                <button
                                    type="submit"
                                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                >
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Form from "form-backend-validation";
export default {
    props:["employeeId"],
    data() {
        return {
            form: new Form({
                name: "",
                phone: "",
                address: "",
                salary: "",
                department: "",
                position: "",
                hire_date: ""
            }),
            id: 2,
            record: Object
        };
    },
    mounted() {
        this.get();
    },
    methods: {
        update() {
            this.form.patch(route("api.employees.update", 2)).then(response => {
                this.get();
                Swal.fire("Success", "Employee data was updated!", "success");
            });
        },
        get() {
            axios
                .get(
                    route("api.employees.show", {
                        id: this.employeeId
                    })
                )
                .then(response => {
                    const results = response.data;
                    this.form.populate(results);
                });
        }
    }
};
</script>
