import Voucher from "@/Models/Voucher";

export function useVoucher(vouchers) {
    return new Voucher(vouchers)
}