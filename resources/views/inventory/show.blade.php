@extends('layouts.app')

@section('content')
    {{-- Toolbar --}}
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->

                <!--end::Description--></h1>
                <!--end::Title-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <!--begin::Filter menu-->
                <!--end::Filter menu-->
                <!--begin::Secondary button-->
                <!--end::Secondary button-->
                <!--begin::Primary button-->
                <a href="{{ route('inventory.create') }}" class="btn btn-sm btn-primary"
                    data-bs-target="#kt_modal_create_app">Create</a>
                <!--end::Primary button-->
            </div>
            <!--end::Actions-->
        </div>
        <!--end::Container-->
    </div>
    {{-- Container --}}
    <div class="row gy-5 g-xl-10">

        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-xl-12 mb-5 mb-xl-10 px-12">
            @if (session()->get('success'))
                <div class="alert alert-success alert-with-border">
                    {{ session()->get('success') }}
                </div>
            @endif
            @if (session()->get('error'))
                <div class="alert alert-danger alert-with-border">
                    {{ session()->get('error') }}
                </div>
            @endif
            <!--begin::Table Widget 4-->
            <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
                <!--begin::Card header-->
                <div class="card-header cursor-pointer">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">{{ $inventory->serial_number }}</h3>
                    </div>
                    <!--end::Card title-->
                    <!--begin::Action-->
                    <a href="../../demo1/dist/account/settings.html" class="btn btn-primary align-self-center">Edit
                        Profile</a>
                    <!--end::Action-->
                </div>
                <!--begin::Card header-->
                <!--begin::Card body-->
                <div class="card-body p-9">
                    <!--begin::Row-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-bold text-muted">Brand Name</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <span class="fw-bolder fs-6 text-gray-800">{{ $inventory->getBrand->name }}</span>
                        </div>
                        <!--end::Col-->
                    </div>
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-bold text-muted">Brand Model</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <a href="#"
                                class="fw-bold fs-6 text-gray-800 text-hover-primary">{{ $inventory->getBrand->model }}</a>
                        </div>
                        <!--end::Col-->
                    </div>
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-bold text-muted">Device Type</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <a href="#"
                                class="fw-bold fs-6 text-gray-800 text-hover-primary">{{ $inventory->getBrand->getType->type_devices }}</a>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-bold text-muted">Serial Number</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <span class="fw-bold text-gray-800 fs-6">{{ $inventory->serial_number }}</span>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-bold text-muted">Condition
                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                title="Phone number must be active"></i></label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 d-flex align-items-center">
                            @if ($inventory->getCondition->condition == 'Broken')
                                <span class="badge badge-danger">{{ $inventory->getCondition->condition }}</span>
                            @else
                                <span class="badge badge-success">{{ $inventory->getCondition->condition }}</span>
                            @endif
                        </div>
                        <!--end::Col-->
                    </div>
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-bold text-muted">Category</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <span class="fw-bold text-gray-800 fs-6">{{ $inventory->getCategory->category }}</span>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <!--end::Input group-->
                    <!--begin::Notice-->
                    <!--end::Notice-->
                </div>

                <!--end::Card body-->
            </div>
            <!--end::Table Widget 4-->
            <!--end::Col-->


            <div class="row gy-5 g-xl-10">
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-12 mb-5 mb-xl-10 px-12">

                    <!--begin::Table Widget 4-->
                    <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
                        <!--begin::Card header-->
                        <div class="card pt-4">
                            <!--begin::Card header-->
                            <div class="card-header border-0">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2>Logs</h2>
                                </div>
                                <!--end::Card title-->
                                <!--begin::Card toolbar-->
                                <div class="card-toolbar">
                                    <!--begin::Button-->
                                    <button type="button" class="btn btn-sm btn-light-primary">
                                        <!--begin::Svg Icon | path: icons/duotune/files/fil021.svg-->
                                        <span class="svg-icon svg-icon-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3"
                                                    d="M19 15C20.7 15 22 13.7 22 12C22 10.3 20.7 9 19 9C18.9 9 18.9 9 18.8 9C18.9 8.7 19 8.3 19 8C19 6.3 17.7 5 16 5C15.4 5 14.8 5.2 14.3 5.5C13.4 4 11.8 3 10 3C7.2 3 5 5.2 5 8C5 8.3 5 8.7 5.1 9H5C3.3 9 2 10.3 2 12C2 13.7 3.3 15 5 15H19Z"
                                                    fill="black" />
                                                <path d="M13 17.4V12C13 11.4 12.6 11 12 11C11.4 11 11 11.4 11 12V17.4H13Z"
                                                    fill="black" />
                                                <path opacity="0.3"
                                                    d="M8 17.4H16L12.7 20.7C12.3 21.1 11.7 21.1 11.3 20.7L8 17.4Z"
                                                    fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->Download Report</button>
                                    <!--end::Button-->
                                </div>
                                <!--end::Card toolbar-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body py-0">
                                <!--begin::Table wrapper-->
                                <div class="table-responsive">
                                    <!--begin::Table-->
                                    <table class="table align-middle table-row-dashed fw-bold text-gray-600 fs-6 gy-5"
                                        id="kt_table_customers_logs">
                                        <!--begin::Table body-->
                                        <tbody>
                                            <!--begin::Table row-->
                                            <tr>
                                                <!--begin::Badge=-->
                                                <td class="min-w-70px">
                                                    <div class="badge badge-light-success">200 OK</div>
                                                </td>
                                                <!--end::Badge=-->
                                                <!--begin::Status=-->
                                                <td>POST /v1/invoices/in_3285_7316/payment</td>
                                                <!--end::Status=-->
                                                <!--begin::Timestamp=-->
                                                <td class="pe-0 text-end min-w-200px">10 Nov 2022, 2:40 pm</td>
                                                <!--end::Timestamp=-->
                                            </tr>
                                            <!--end::Table row-->
                                            <!--begin::Table row-->
                                            <tr>
                                                <!--begin::Badge=-->
                                                <td class="min-w-70px">
                                                    <div class="badge badge-light-danger">500 ERR</div>
                                                </td>
                                                <!--end::Badge=-->
                                                <!--begin::Status=-->
                                                <td>POST /v1/invoice/in_8479_6427/invalid</td>
                                                <!--end::Status=-->
                                                <!--begin::Timestamp=-->
                                                <td class="pe-0 text-end min-w-200px">25 Jul 2022, 9:23 pm</td>
                                                <!--end::Timestamp=-->
                                            </tr>
                                            <!--end::Table row-->
                                            <!--begin::Table row-->
                                            <tr>
                                                <!--begin::Badge=-->
                                                <td class="min-w-70px">
                                                    <div class="badge badge-light-warning">404 WRN</div>
                                                </td>
                                                <!--end::Badge=-->
                                                <!--begin::Status=-->
                                                <td>POST /v1/customer/c_61de0bed6ab07/not_found</td>
                                                <!--end::Status=-->
                                                <!--begin::Timestamp=-->
                                                <td class="pe-0 text-end min-w-200px">20 Dec 2022, 10:30 am</td>
                                                <!--end::Timestamp=-->
                                            </tr>
                                            <!--end::Table row-->
                                            <!--begin::Table row-->
                                            <tr>
                                                <!--begin::Badge=-->
                                                <td class="min-w-70px">
                                                    <div class="badge badge-light-warning">404 WRN</div>
                                                </td>
                                                <!--end::Badge=-->
                                                <!--begin::Status=-->
                                                <td>POST /v1/customer/c_61de0bed6ab04/not_found</td>
                                                <!--end::Status=-->
                                                <!--begin::Timestamp=-->
                                                <td class="pe-0 text-end min-w-200px">25 Jul 2022, 11:05 am</td>
                                                <!--end::Timestamp=-->
                                            </tr>
                                            <!--end::Table row-->
                                            <!--begin::Table row-->
                                            <tr>
                                                <!--begin::Badge=-->
                                                <td class="min-w-70px">
                                                    <div class="badge badge-light-warning">404 WRN</div>
                                                </td>
                                                <!--end::Badge=-->
                                                <!--begin::Status=-->
                                                <td>POST /v1/customer/c_61de0bed6ab04/not_found</td>
                                                <!--end::Status=-->
                                                <!--begin::Timestamp=-->
                                                <td class="pe-0 text-end min-w-200px">15 Apr 2022, 2:40 pm</td>
                                                <!--end::Timestamp=-->
                                            </tr>
                                            <!--end::Table row-->
                                            <!--begin::Table row-->
                                            <tr>
                                                <!--begin::Badge=-->
                                                <td class="min-w-70px">
                                                    <div class="badge badge-light-success">200 OK</div>
                                                </td>
                                                <!--end::Badge=-->
                                                <!--begin::Status=-->
                                                <td>POST /v1/invoices/in_8779_9049/payment</td>
                                                <!--end::Status=-->
                                                <!--begin::Timestamp=-->
                                                <td class="pe-0 text-end min-w-200px">10 Mar 2022, 9:23 pm</td>
                                                <!--end::Timestamp=-->
                                            </tr>
                                            <!--end::Table row-->
                                            <!--begin::Table row-->
                                            <tr>
                                                <!--begin::Badge=-->
                                                <td class="min-w-70px">
                                                    <div class="badge badge-light-danger">500 ERR</div>
                                                </td>
                                                <!--end::Badge=-->
                                                <!--begin::Status=-->
                                                <td>POST /v1/invoice/in_9001_6414/invalid</td>
                                                <!--end::Status=-->
                                                <!--begin::Timestamp=-->
                                                <td class="pe-0 text-end min-w-200px">20 Jun 2022, 11:05 am</td>
                                                <!--end::Timestamp=-->
                                            </tr>
                                            <!--end::Table row-->
                                            <!--begin::Table row-->
                                            <tr>
                                                <!--begin::Badge=-->
                                                <td class="min-w-70px">
                                                    <div class="badge badge-light-warning">404 WRN</div>
                                                </td>
                                                <!--end::Badge=-->
                                                <!--begin::Status=-->
                                                <td>POST /v1/customer/c_61de0bed6ab06/not_found</td>
                                                <!--end::Status=-->
                                                <!--begin::Timestamp=-->
                                                <td class="pe-0 text-end min-w-200px">10 Nov 2022, 11:05 am</td>
                                                <!--end::Timestamp=-->
                                            </tr>
                                            <!--end::Table row-->
                                            <!--begin::Table row-->
                                            <tr>
                                                <!--begin::Badge=-->
                                                <td class="min-w-70px">
                                                    <div class="badge badge-light-success">200 OK</div>
                                                </td>
                                                <!--end::Badge=-->
                                                <!--begin::Status=-->
                                                <td>POST /v1/invoices/in_6826_9430/payment</td>
                                                <!--end::Status=-->
                                                <!--begin::Timestamp=-->
                                                <td class="pe-0 text-end min-w-200px">25 Jul 2022, 6:43 am</td>
                                                <!--end::Timestamp=-->
                                            </tr>
                                            <!--end::Table row-->
                                            <!--begin::Table row-->
                                            <tr>
                                                <!--begin::Badge=-->
                                                <td class="min-w-70px">
                                                    <div class="badge badge-light-success">200 OK</div>
                                                </td>
                                                <!--end::Badge=-->
                                                <!--begin::Status=-->
                                                <td>POST /v1/invoices/in_3285_7316/payment</td>
                                                <!--end::Status=-->
                                                <!--begin::Timestamp=-->
                                                <td class="pe-0 text-end min-w-200px">22 Sep 2022, 2:40 pm</td>
                                                <!--end::Timestamp=-->
                                            </tr>
                                            <!--end::Table row-->
                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Table wrapper-->
                            </div>
                            <!--end::Card body-->

                            <!--end::Table Widget 4-->
                        </div>
                    </div>
                </div>
                <!--end::Col-->
            @endsection
