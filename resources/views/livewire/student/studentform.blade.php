<div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false" wire:ignore.self>
	<!--begin::Modal dialog-->
	<div class="modal-dialog modal-dialog-centered mw-650px">
		<!--begin::Modal content-->
		<div class="modal-content">
			<!--begin::Form-->
			<form class="form" action="#" id="kt_modal_add_customer_form" wire:submit.prevent="submit_student">
				<!--begin::Modal header-->
				<div class="modal-header" id="kt_modal_add_customer_header">
					<!--begin::Modal title-->
					<h2 class="fw-bold">Add Students</h2>
					<!--end::Modal title-->
					<!--begin::Close-->
					<div id="kt_modal_add_branch_close" class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal"
                     wire:loading.attr="disabled">						<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
						<span class="svg-icon svg-icon-1">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
								<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
							</svg>
						</span>
						<!--end::Svg Icon-->
					</div>
					<!--end::Close-->
				</div>
				<!--end::Modal header-->
				<!--begin::Modal body-->
				<div class="modal-body py-10 px-lg-17">
					<!--begin::Scroll-->
					<div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_customer_header" data-kt-scroll-wrappers="#kt_modal_add_customer_scroll" data-kt-scroll-offset="300px">
						<!--begin::Input group-->
						<div class="fv-row mb-7">
							<!--begin::Label-->
							<label class="required fs-6 fw-semibold mb-2">Name</label>
							<!--end::Label-->
							<!--begin::Input-->
							<input type="text" class="form-control " placeholder="" name="name" value="" id="name"  wire:model.defer="name"/>
							<!--end::Input-->
							@error('name')
                            <span class="text-danger">{{ $message }}</span> @enderror
						</div>
						<!--end::Input group-->
						<!--begin::Input group-->
						<div class="fv-row mb-7">
							<!--begin::Label-->
							<label class="fs-6 fw-semibold mb-2">
								<span class="required">Student No</span>
								
							</label>
							<!--end::Label-->
							<!--begin::Input-->
							<input type="text" class="form-control " placeholder="" name="student_no" value="" id="student_no"  wire:model.defer="student_no"/>
							<!--end::Input-->
							@error('student_no')
                            <span class="text-danger">{{ $message }}</span> @enderror
						</div>
						<!--end::Input group-->
					
					
					
						
					</div>
					<!--end::Scroll-->
				</div>
				<!--end::Modal body-->
				<!--begin::Modal footer-->
				<div class="modal-footer flex-center">
					<button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" aria-label="Close" wire:loading.attr="disabled">Discard</button>
					<button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
						<span class="indicator-label" wire:loading.remove>Submit</span>
						<span class="indicator-progress" wire:loading wire:target="submit">
							Please wait...
							<span class="spinner-border spinner-border-sm align-middle ms-2"></span>
						</span>
					</button>
				</div>
				<!--end::Modal footer-->
			</form>
			<!--end::Form-->
		</div>
	</div>
</div>