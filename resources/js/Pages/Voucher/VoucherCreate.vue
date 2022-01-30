<template>
   <Head title="Add Voucher" />

   <FlashMessages />

   <form class="flex flex-col">

	  <div class="flex justify-between items-center">
		 <Title>Add Voucher</Title>
		 <ResponsiveNavLink as="button"
							:disabled="form.processing"
							@click="onSubmit">Save
		 </ResponsiveNavLink>
	  </div>

	  <Accordion>
		 <AccordionItem open="section-1"
						selected-name="section-1"
						title="General">
			<div class="w-1/3 mb-4">
			   <Label>COD amount</Label>
			   <Input @clearError="form.clearErrors('COD_amount')"
					  :hasError="form.errors.COD_amount"
					  v-model="form.COD_amount" />
			   <InputError :message="form.errors.COD_amount" />
			</div>

			<div class="w-1/3 mb-4">
			   <Label required>Name</Label>
			   <Input @clearError="form.clearErrors('name')"
					  :hasError="form.errors.name"
					  v-model="form.name" />
			   <InputError :message="form.errors.name" />
			</div>

			<div class="w-1/3 mb-4">
			   <Label required>Address</Label>
			   <Input @clearError="form.clearErrors('address')"
					  :hasError="form.errors.address"
					  v-model="form.address" />
			   <InputError :message="form.errors.address" />
			</div>

			<div class="w-1/3 mb-4">
			   <Label required>Zipcode</Label>
			   <Input @clearError="form.clearErrors('zipcode')"
					  :hasError="form.errors.zipcode"
					  v-model="form.zipcode" />
			   <InputError :message="form.errors.zipcode" />
			</div>

			<div class="w-1/3 mb-4">
			   <Label required>Phone</Label>
			   <Input @clearError="form.clearErrors('phone')"
					  :hasError="form.errors.phone"
					  v-model="form.phone" />
			   <InputError :message="form.errors.phone" />
			</div>
		 </AccordionItem>

		 <AccordionItem selected-name="section-2"
						title="Courier">

			<div class="w-1/3 mb-4">
			   <Label required>Provider</Label>
			   <Select @clearError="form.clearErrors('courier')"
					   :hasError="form.errors.courier"
					   v-model="form.courier"
					   :options="couriers" />
			   <InputError :message="form.errors.courier" />
			</div>

			<div v-if="form.courier === 'acs'">
			   <div class="w-1/3 mb-4">
				  <Label>Return Service</Label>
				  <Switch v-model="form.return_service"
						  :class="[form.return_service ? 'bg-indigo-600' : 'bg-gray-200', 'mt-2 relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500']">
				  <span aria-hidden="true"
						:class="[form.return_service ? 'translate-x-5' : 'translate-x-0', 'pointer-events-none inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200']" />
				  </Switch>
			   </div>

			   <div class="w-1/3 mb-4">
				  <Label required>Store Name</Label>
				  <Input @clearError="form.clearErrors('store_name')"
						 :hasError="form.errors.store_name"
						 v-model="form.store_name" />
				  <InputError :message="form.errors.store_name" />
			   </div>

			   <div v-if="form.return_service"
					class="w-1/3 mb-4">
				  <Label required>Return Type</Label>
				  <Input @clearError="form.clearErrors('return_type')"
						 :hasError="form.errors.return_type"
						 v-model="form.return_type" />
				  <InputError :message="form.errors.return_type" />
			   </div>
			</div>

			<div v-if="form.courier === 'elta'">
			   <div class="w-1/3 mb-4">
				  <Label>Return Service</Label>
				  <Switch v-model="form.return_service"
						  :class="[form.return_service ? 'bg-indigo-600' : 'bg-gray-200', 'mt-2 relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500']">
				  <span aria-hidden="true"
						:class="[form.return_service ? 'translate-x-5' : 'translate-x-0', 'pointer-events-none inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200']" />
				  </Switch>
			   </div>
			   <div class="w-1/3 mb-4">
				  <Label>Express Service</Label>
				  <Switch v-model="form.express_service"
						  :class="[form.express_service ? 'bg-indigo-600' : 'bg-gray-200', 'mt-2 relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500']">
				  <span aria-hidden="true"
						:class="[form.express_service ? 'translate-x-5' : 'translate-x-0', 'pointer-events-none inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200']" />
				  </Switch>
			   </div>
			</div>

		 </AccordionItem>
	  </Accordion>

   </form>

</template>

<script>
import Admin from "@/Layouts/Admin"

export default {
   name: "Dashboard",
   layout: Admin
}
</script>

<script setup>
import {Head, useForm} from "@inertiajs/inertia-vue3";
import ResponsiveNavLink from "@/Shared/ResponsiveNavLink";
import Title from "@/Shared/Title";
import AccordionItem from "@/Shared/Elements/AccordionItem";
import Accordion from "@/Shared/Elements/Accordion";
import Input from "@/Shared/Form/Input";
import Label from "@/Shared/Form/Label";
import InputError from "@/Shared/Form/InputError";
import Select from "@/Shared/Form/Select";
import {Switch} from '@headlessui/vue'
import FlashMessages from "@/Shared/Overlays/FlashMessages";

const couriers = ["acs", "elta"]

const form = useForm("CreateVoucher", {
   COD_amount: null,
   name: null,
   address: null,
   zipcode: null,
   phone: null,
   courier: "acs",
   return_service: false,
   store_name: null,
   return_type: null,
   express_service: false,
})

const onSubmit = () => {
   form.post(route('voucher.store'), {
	  onSuccess: () => form.reset(),
   })
}


</script>


<style scoped>

</style>
