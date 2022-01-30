import moment from "moment/moment";

export default class Voucher {
    constructor(vouchers) {
        this.vouchers = vouchers;
    }

    allVouchers() {
        return this.vouchers.data
    }

    getOwner(voucher) {
        return voucher.user.name
    }

    getCreated(voucher) {
        return moment(voucher.created_at).format('MM/DD/YYYY HH:mm');

    }

    getCourierable(voucher) {
        return voucher.courier.courierable
    }

    getCourier(voucher) {
        if (voucher.courier?.courierable_type) {
            return voucher.courier.courierable_type.replace("App\\Models\\", '').toLowerCase()
        } else {
            const hasCourier = voucher.courier.courier?.courierable_type
            if (hasCourier) {
                return hasCourier.replace("App\\Models\\", '').toLowerCase()
            }
        }
        return "-"
    }
}