<template>

   <Head title="Voucher" />

   <FlashMessages />

   <div class="flex flex-col">

	  <div class="flex justify-between items-center">
		 <Title>Voucher</Title>
		 <ResponsiveNavLink class="flex space-x-3"
							:href="route('voucher.create')">
			<DocumentAddIcon class="w-4" />
			<span>Add Voucher</span>
		 </ResponsiveNavLink>
	  </div>
	  <!--Filter-->
	  <div class="flex py-5 justify-between items-center space-x-10">
		 <!--Search-->
		 <div class="w-60">

			<Label>Search</Label>

			<div class="mt-1 relative flex items-center">

			   <Input v-model="form.search"
					  placeholder="Search.."
					  :icon="true">
				  <SearchIcon class="w-5" />
			   </Input>

			</div>

		 </div>

		 <div class="flex w-1/4  space-x-5">
			<!--Limit-->
			<div class="flex flex-col flex-1">
			   <Label class="flex space-x-3">
				  <FilterIcon class="w-4 text-indigo-600" />
				  <span>Items Per Page</span>
			   </Label>
			   <Select v-model="form.limit"
					   :options="limitFilter" />
			</div>

		 </div>
	  </div>

	  <!--Preview Filter-->
	  <div class="py-4 flex space-x-2">

		 <Filter :form="form.order"
				 :filter-name-second="form.sort"
				 filter-name="sort"
				 @removeFilter="removeFilter" />

		 <Filter :form="form.limit"
				 filter-name="limit"
				 @removeFilter="removeFilter" />

	  </div>
	  <!--Table voucher-->
	  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
		 <div class="py-2 align-middle inline-block  sm:px-6 lg:px-8 w-full">
			<div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg w-full">
			   <table class="divide-y divide-gray-200 w-full">
				  <thead class="bg-gray-50">
				  <tr>
					 <Th class="cursor-pointer"
						 @click="onSort('name')">Name
					 </Th>
					 <Th>Courier</Th>
					 <Th class="cursor-pointer"
						 @click="onSort('COD_amount')">COD amount
					 </Th>
					 <Th class="cursor-pointer"
						 @click="onSort('address')">Address
					 </Th>
					 <Th class="cursor-pointer"
						 @click="onSort('zipcode')">Zipcode
					 </Th>
					 <Th>Phone</Th>
					 <Th class="cursor-pointer"
						 @click="onSort('created_at')">Create
					 </Th>
					 <Th></Th>
				  </tr>
				  </thead>
				  <tbody class="bg-white divide-y divide-gray-200">
				  <tr v-for="voucher in getVouchers.allVouchers()"
					  :key="voucher.email">
					 <Td>
						<DoubleLine :base="voucher.name"
									:second="getVouchers.getOwner(voucher)" />
					 </Td>
					 <Td>
						{{ getVouchers.getCourier(voucher) }}
					 </Td>
					 <Td>
						{{ voucher.COD_amount }}
					 </Td>
					 <Td>
						{{ voucher.address }}
					 </Td>
					 <Td>{{ voucher.zipcode }}</Td>
					 <Td>{{ voucher.phone }}</Td>
					 <Td>{{ getVouchers.getCreated(voucher) }}</Td>
					 <Td
						 class="flex space-x-4">
						<Link :href="voucher.link.edit">
						   <PencilIcon class="w-5" />
						</Link>
					 </Td>
				  </tr>
				  </tbody>
			   </table>

			   <Pagination :links="vouchers.links" />

			</div>
		 </div>
	  </div>

   </div>


</template>


<script>
import Admin from "@/Layouts/Admin"

export default {
   name: "Dashboard",
   layout: Admin
}
</script>

<script setup>
import {Link, usePage} from "@inertiajs/inertia-vue3";
import {Head} from "@inertiajs/inertia-vue3";
import Title from "@/Shared/Title";
import Th from "@/Shared/Table/Th";
import Td from "@/Shared/Table/Td";
import DoubleLine from "@/Shared/Table/DoubleLine";
import Pagination from "@/Shared/Table/Pagination";
import {SearchIcon} from '@heroicons/vue/solid'
import {computed, onMounted, reactive, watch} from "vue";
import Input from "@/Shared/Form/Input";
import Filter from "@/Shared/Table/Filter";
import Select from "@/Shared/Form/Select";
import ResponsiveNavLink from "@/Shared/ResponsiveNavLink";
import FlashMessages from "@/Shared/Overlays/FlashMessages";
import {DocumentAddIcon} from "@heroicons/vue/outline"
import {FilterIcon, PencilIcon} from "@heroicons/vue/outline"
import useFilter from "@/Composables/useFilter";
import {useVoucher} from "@/Composables/useVoucher";


const props = defineProps({
   vouchers: Object,
   filters: Object
})


const form = reactive({
   search: props.filters.search,
   limit: props.filters.limit ?? 10,
   sort: props.filters.sort,
   order: props.filters.order,
})


const {onSort, removeFilter, limitFilter} = useFilter(form, "voucher");


const getVouchers = computed(() => useVoucher(props.vouchers))


</script>

<style scoped>

</style>