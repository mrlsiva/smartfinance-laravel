@extends('layouts.master')
@section('body')

<style> 
.parent-active .col {
    filter: grayscale(100%);
}

 .col.active {
    filter: grayscale(0%);
} 
</style>

@php
    $auth = Auth::guard('web')->user();
@endphp
<!--begin::Toolbar-->
    <div class="toolbar py-5 py-lg-15" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column me-3">
                <!--begin::Title-->
                <h1 class="d-flex text-white fw-bolder my-1 fs-3">Welcome - {{$auth->first_name}} {{$auth->last_name}}</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-white opacity-75"><a class="text-hover-primary text-white opacity-75" href="{{route('dashboard')}}"><i class="fa fa-envelope"></i> {{$auth->email}} <i class="fa fa-phone-square"></i> {{$auth->phone}}</a></li>
                    <!--end::Item-->        
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
        </div>
        <!--end::Container-->
    </div>
<!--end::Toolbar-->
<!--begin::Container-->
<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
    <!--begin::Post-->
    <div class="content flex-row-fluid" id="kt_content">
        <!--begin::Row-->
        <div class="row gy-5 g-xl-8 ">
            <!--begin::Col-->
            <div class="col-xl-12">
                <!--begin::Mixed Widget 2-->
                <div class="card card-xl-stretch" style="height: 200px">
                    <!--begin::Header-->
                    <div class="card-header border-0 bg-warning py-5">
                        <!-- <h3 class="card-title fw-bolder text-white">Sales Statistics</h3> -->
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body p-0">
                        <!--begin::Stats-->
                        <div class="card-p mt-n20 position-relative">
                            <!--begin::Row-->
                            
                            <div class="row g-0 parent-active">
                                <a href="#" onclick="user()" class="text-dark fw-bold fs-6 col active border-bottom border-warning bg-light-warning p-6 rounded-2 me-7 mb-7" id="user_management">    

                                    <div class="d-flex flex-stack flex-grow-1">
                                        <div class="d-flex flex-column me-2">
                                            <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" style="vertical-align: -0.125em;" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="currentColor" d="M7.5 6.5C7.5 8.981 9.519 11 12 11s4.5-2.019 4.5-4.5S14.481 2 12 2S7.5 4.019 7.5 6.5zM20 21h1v-1c0-3.859-3.141-7-7-7h-4c-3.86 0-7 3.141-7 7v1h17z"></path>
                                                </svg>
                                            </span>            
                                        </div>
                                        <span class="symbol symbol-50px">
                                            <span class="px-3 py-1 fs-5 fw-bolder bg-warning text-white">{{$user_count}}</span>
                                        </span>
                                    </div>
                                    User Management
                                </a>
                                <a href="#" onclick="finance()" class="text-dark fw-bold fs-6 col border-bottom border-warning bg-light-warning p-6 rounded-2 me-7 mb-7" id="smart_finance">                                   
                                    <div class="d-flex flex-stack flex-grow-1">
                                        <div class="d-flex flex-column me-2">       
                                            <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="currentColor" d="m6 16.5l-3 2.94V11h3m5 3.66l-1.57-1.34L8 14.64V7h3m5 6l-3 3V3h3m2.81 9.81L17 11h5v5l-1.79-1.79L13 21.36l-3.47-3.02L5.75 22H3l6.47-6.34L13 18.64"></path></svg>
                                            </span>            
                                        </div>
                                        <span class="symbol symbol-50px">
                                            <span class="px-3 py-1 fs-5 fw-bolder bg-warning text-dark">{{$smartfinance_count+$payment_count}}</span>
                                        </span>
                                    </div>
                                    Smart Finance
                                </a>
                                <a href="#" class="text-dark fw-bold fs-6 col border-bottom border-warning bg-light-warning p-6 rounded-2 me-7 mb-7">
                                                                    
                                    <div class="d-flex flex-stack flex-grow-1">
                                        <div class="d-flex flex-column me-2">
                                            <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" style="vertical-align: -0.125em;" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 64 64"><ellipse cx="10.97" cy="52.578" fill="currentColor" rx="1.742" ry="1.188"></ellipse><path fill="currentColor" d="m62 46.669l-.654-.384c-.05-.029-5.047-2.994-6.289-6.592l-.277-.797l-.512.669c-.016.021-.726.899-2.713 1.929c-1.471-8.373-6.475-18.369-13.051-22.631c1.88.152 3.766-.004 5.586-.666c1.096-.398.623-2.184-.483-1.78c-1.492.543-2.987.691-4.479.615c3.663-3.357 6.539-8.502 6.539-12.264c0-.904 0-2.587-1.34-2.587c-.538 0-.973.336-1.574.8c-.922.711-2.314 1.787-4.359 1.787c-.779 0-2.205-.822-3.351-1.482C33.658 2.489 32.773 2 32.029 2c-1.232 0-3.043.996-4.641 1.875c-.65.357-1.539.847-1.723.894c-2.316 0-3.661-1.068-4.553-1.775c-.52-.414-.897-.714-1.4-.714c-1.318 0-1.318 1.581-1.318 3.412c0 3.534 2.692 8.199 6.217 11.334c-2.221.159-4.411.83-5.95 2.321c-.85.822.438 2.126 1.285 1.306c1.279-1.24 2.956-1.771 4.75-1.874c.051.183.113.363.189.54C17.369 24.72 12.03 37.545 12.03 46.203c0 .854.066 1.627.168 2.355c-1.938-.861-2.645-1.616-2.659-1.633l-.516-.595l-.254.75c-1.123 3.304-6.005 6.17-6.054 6.199L2 53.694l.727.393c.255.138.508.259.763.39l-.46.319l.243 3.04L22.326 62l7.224-4.621c.729.004 1.467.006 2.218.006L40.212 62l19.089-6v-3.209l-.505-.303c.252-.16.504-.323.755-.491l.669-.447l-.147-.072l.851-.233l.144-3.336l-.492-.349c.262-.157.523-.317.785-.483l.639-.408M20.213 5.692c0-.444.006-.79.015-1.059c.153.12.331.251.521.386c.583 1.396 1.686 3.406 3.556 4.672c2.272 1.54 1.97-.23 3.182-1.846c1.212-1.615 2.032-2.461 4.062 1.693c.885 1.811 2.36-3.25 3.762-3.989c.371.202.741.39 1.104.55c2.514 4.088 3.679 2.813 5.912-.585c.614-.36 1.118-.746 1.519-1.055c.002.093.004.196.004.311c0 3.21-2.623 7.814-5.835 10.817a3.59 3.59 0 0 0-.642-1.053c-1.297-1.469-3.324.16-4.285 1.229c-1.705-.548-4.483-2.057-6.293-1.193a4.61 4.61 0 0 0-1.226.831c-2.96-2.698-5.356-6.593-5.356-9.709m16.204 10.974a26.467 26.467 0 0 1-1.337-.32c.558-.481 1.07-.649 1.285.066c.023.078.037.167.052.254m-7.6.621c-.331-.063-.671-.12-1.021-.165a14.18 14.18 0 0 1-.779-.525c.914-.613 2.49-.287 3.996.224c-.743.075-1.476.237-2.196.466m.454 2.64c-.56.14-1.17.084-1.697-.126c.214-.113.43-.211.646-.31c.35.169.7.31 1.051.436M10.774 56.379a39.327 39.327 0 0 1-6.912-2.733c1.357-.892 4.313-3.049 5.515-5.641c.824.647 2.726 1.827 6.43 2.733c-.063.102-.14.211-.214.318c-3.162-.828-4.96-1.875-4.989-1.893l-.436-.26l-.209.467c-.275.612-.92.704-1.279.704c-.1 0-.167-.007-.176-.008l-.357-.052l-.13.342c-.266.698-1.358 1.61-1.758 1.903l-.668.49l.764.313c.284.116.361.223.365.251c.01.069-.111.251-.24.356l-.582.469l.677.313c1.387.64 2.958 1.17 4.529 1.607c-.125.123-.233.228-.33.321m8.064-3.726c1.398.196 2.947.32 4.639.32h.001c.352 0 .709-.006 1.073-.017a.851.851 0 0 0 .103.213c.089.135.209.247.361.334l-2.552 2.181a3.216 3.216 0 0 0-.146-.003c-1.137 0-1.985.418-2.392 1.162a68.481 68.481 0 0 1-4.602-.747a51.413 51.413 0 0 0 3.515-3.443M7.489 53.85c.1-.189.165-.418.13-.668a1.016 1.016 0 0 0-.307-.59c.449-.385 1.068-.979 1.408-1.594c.773-.011 1.411-.304 1.813-.822c.677.354 2.202 1.069 4.455 1.689c-.921 1.155-2.162 2.465-3.127 3.439c-1.504-.398-3.019-.878-4.372-1.454m14.251 4.209l-.205.001c-.861 0-3.714-.07-7.483-.855c.132-.112.269-.227.396-.337c3.058.639 5.524.913 5.709.934l.366.039l.113-.355c.247-.766 1.158-.879 1.68-.879c.143 0 .238.009.249.01l.194.021l4.433-3.788l-1.185-.039c-.396-.014-.563-.103-.604-.164l.251-.657l-.694.029c-.506.022-1 .033-1.483.033h-.001c-1.396 0-2.691-.092-3.888-.237l.278-.328c2.416.323 5.309.522 8.802.497c-.834 1.17-2.914 3.657-6.928 6.075m10.024-4.345v1.825c-.569 0-1.123-.002-1.665-.006l-.163-2.054l-1.354.11c.912-1.078 1.301-1.797 1.336-1.862l.367-.694l-.775.014c-7.418.136-12.256-.748-15.31-1.73c-.223-.902-.352-1.922-.352-3.113c0-8.123 5.191-20.401 12.083-25.377c1.221 1.181 3.073 1.698 4.833.549c.386-.252.722-.582 1.037-.933c.075.002.152.019.228.019c.252 0 .508-.021.763-.053c.323.129.639.259.932.388c1.403.618 2.601.234 3.419-.618c6.313 3.82 11.371 13.925 12.702 22.093c-2.886 1.154-7.464 2.28-14.49 2.478c1.386-.792 2.426-2.124 2.052-3.874c-.393-1.85-1.939-2.37-3.54-2.455c-.004-.869-.004-1.736.002-2.605c.491.217.962.467 1.39.734c.756.475 1.44-.756.689-1.231a10.293 10.293 0 0 0-2.072-.999c.01-1.006.015-2.01.015-3.014c.001-.92-1.366-.92-1.366 0c0 .883-.006 1.765-.014 2.646a7.1 7.1 0 0 0-2.202-.037a26.48 26.48 0 0 0-.432-1.97c-.226-.886-1.546-.511-1.317.378c.168.639.305 1.275.418 1.92c-.058.022-.121.033-.178.059c-1.852.733-2.982 2.602-1.627 4.345c.631.812 1.456 1.14 2.359 1.249c.049 1.203.08 2.407.115 3.609c-.605-.393-1.156-.897-1.655-1.43c-.618-.652-1.583.355-.966 1.006c.839.893 1.72 1.568 2.675 2c.043 1.027.104 2.057.204 3.079c.088.907 1.456.912 1.367 0a53.716 53.716 0 0 1-.187-2.657c.52.09 1.066.113 1.646.058c.065.946.141 1.892.249 2.838c.062.542.58.755.962.645l-.085 1.964c-.602.054-1.216.104-1.856.146l-.762.05l.406.656c.041.066.502.795 1.531 1.856h-1.412zm24.888-6.582c-1.257.591-2.847 1.133-4.467 1.606c-.996-1.029-2.27-2.402-3.221-3.62c2.119-.642 3.305-1.304 3.84-1.661c.423.373.983.567 1.646.566c.22 0 .415-.021.565-.045c.48.622 1.254 1.34 1.738 1.769c-.229.235-.34.495-.331.776c.008.24.104.444.23.609m-7.155 3.286c.204.18.415.364.63.55c-4.054 1.075-7.071 1.192-7.728 1.203c-4.198-2.561-6.374-5.271-7.213-6.491c3.513-.088 6.417-.406 8.839-.844a24 24 0 0 0 .299.36a53.115 53.115 0 0 1-5.877.583l-.807.034l.444.679c-.001.001-.091.169-.687.285l-.969.189l4.764 3.857l.222-.06c.005-.001.425-.114.933-.114c.733 0 1.234.223 1.486.659l.16.276l.311-.055a87.25 87.25 0 0 0 5.193-1.111M35.4 47.479l-1.138-.062c-.053-.568-.106-1.136-.146-1.704c.2.332.61.956 1.284 1.766m-1.408-3.661a105.002 105.002 0 0 1-.119-4.041c.164.006.326.021.48.043c1.768.268 2.23 2.234.85 3.34c-.36.285-.775.494-1.211.658m10.439 6.752c-.448-.553-1.161-.843-2.083-.843c-.385 0-.724.052-.938.094l-2.995-2.427c.249-.143.417-.324.509-.546a.953.953 0 0 0 .052-.171c2.374-.13 4.374-.367 6.065-.657c.82.915 2.025 2.177 3.623 3.644c-1.963.467-3.6.787-4.233.906M32.505 39.813c.019 1.449.055 2.902.132 4.35c-.129.02-.256.045-.383.058c-.43.049-.838.013-1.226-.085c-.049-1.4-.081-2.803-.134-4.204c.538-.025 1.083-.078 1.611-.119m-1.68-1.265a44.292 44.292 0 0 0-.31-3.286a5.34 5.34 0 0 1 1.987.101a285.006 285.006 0 0 0-.005 3.067c-.439.024-.856.066-1.223.099a6.32 6.32 0 0 1-.449.019m-1.372-.175c-.085-.023-.169-.041-.256-.07a2.671 2.671 0 0 1-1.057-.667c-.854-.797.318-1.579 1.057-1.95c.116.89.196 1.788.256 2.687M40.49 57.839c-4.341-2.218-6.67-4.683-7.595-5.825c.665-.05 1.294-.11 1.917-.173l7.118 4.62l15.61-4.288c-8.05 4.852-16.003 5.591-17.05 5.666m12.892-7.89c-.128-.128-.281-.28-.462-.463c1.776-.538 3.494-1.162 4.775-1.848l.779-.419l-.79-.402c-.177-.091-.35-.258-.353-.321c.002-.024.072-.152.375-.326l.578-.332l-.514-.428c-.016-.013-1.619-1.344-2.182-2.201l-.186-.28l-.319.093c-.003 0-.277.079-.633.079c-.55.001-.962-.179-1.226-.533l-.292-.387l-.366.315c-.019.016-1.152.945-4.191 1.823a10.25 10.25 0 0 1-.289-.44c3.685-1.117 5.568-2.469 6.384-3.209c1.31 2.834 4.429 5.117 5.783 6.012a37.972 37.972 0 0 1-6.871 3.267"></path><path fill="currentColor" d="M44.38 47.117c-.997-.271-2.122-.086-2.516.409c-.391.497.103 1.123 1.099 1.396c.998.271 2.122.085 2.516-.411c.391-.497-.101-1.121-1.099-1.394"></path></svg>
                                            </span>         
                                        </div>
                                        <span class="symbol symbol-50px">
                                            <span class="px-3 py-1 fs-5 fw-bolder bg-warning text-white">0</span>
                                        </span>
                                    </div>
                                    Loan
                                </a>
                                <a href="#" class="text-dark fw-bold fs-6 col border-bottom border-warning bg-light-warning p-6 rounded-2 me-7 mb-7">
                                                                   
                                    <div class="d-flex flex-stack flex-grow-1">
                                        <div class="d-flex flex-column me-2">
                                            <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" style="vertical-align: -0.125em;" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="currentColor" d="m4.406 14.523l3.402-3.402l2.828 2.829l3.157-3.157L12 9h5v5l-1.793-1.793l-4.571 4.571l-2.828-2.828l-2.475 2.474a8 8 0 1 0-.927-1.9zm-1.538 1.558l-.01-.01l.004-.004A9.965 9.965 0 0 1 2 12C2 6.477 6.477 2 12 2s10 4.477 10 10s-4.477 10-10 10c-4.07 0-7.57-2.43-9.132-5.919z"></path></svg>
                                            </span>         
                                        </div>
                                        <span class="symbol symbol-50px">
                                            <span class="px-3 py-1 fs-5 fw-bolder bg-warning text-white">0</span>
                                        </span>
                                    </div>
                                    Mutual Fund
                                </a>
                                <a href="#" class="text-dark fw-bold fs-6 col border-bottom border-warning bg-light-warning p-6 rounded-2 me-7 mb-7">                            
                                    <div class="d-flex flex-stack flex-grow-1">
                                        <div class="d-flex flex-column me-2">       
                                            <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" style="vertical-align: -0.125em;" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 1024 1024"><path fill="currentColor" d="M128 384h768v-64a64 64 0 0 0-64-64H192a64 64 0 0 0-64 64v64zm0 64v320a64 64 0 0 0 64 64h640a64 64 0 0 0 64-64V448H128zm64-256h640a128 128 0 0 1 128 128v448a128 128 0 0 1-128 128H192A128 128 0 0 1 64 768V320a128 128 0 0 1 128-128z"></path><path fill="currentColor" d="M384 128v64h256v-64H384zm0-64h256a64 64 0 0 1 64 64v64a64 64 0 0 1-64 64H384a64 64 0 0 1-64-64v-64a64 64 0 0 1 64-64z"></path></svg>
                                            </span>         
                                        </div>
                                        <span class="symbol symbol-50px">
                                            <span class="px-3 py-1 fs-5 fw-bolder bg-warning text-white">0</span>
                                        </span>
                                    </div>
                                    Insurance
                                </a>
                            </div>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <div class="row g-0">
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end::Stats-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Mixed Widget 2-->
            </div>
            <!--end::Col-->
        </div>
        <!--end::Row-->
        @php
            $user = Auth::guard('web')->user();
            $detail = DB::table('user_details')->where('user_id',$user->id)->first();
        @endphp
        @if($user->is_profile_verified == 1)
            <!--begin::Row-->
            <div class="row gy-5 g-xl-8 mt-xl-5" id="user">
                <!--begin::Col-->
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-12 ">
                    <!--begin::Tables Widget 9-->
                    <div class="card card-xl-stretch mb-5 mb-xl-8">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder text-dark">User Management</span>
                                <!-- <span class="text-gray-400 mt-1 fw-bold fs-6">Avg. 10 customers added per day</span> -->
                            </h3>
                            <!--begin::Actions-->
                            <div class="card-toolbar">
                                <!--begin::Filters-->
                                <div class="d-flex flex-stack flex-wrap gap-4">
                                    <!--begin::Destination-->
                                    <!--end::Destination-->
                                    <!--begin::Profile-->
                                    <div class="d-flex align-items-center fw-bolder">
                                        <!--begin::Label-->
                                        <div class="text-muted fs-7 me-2">Role</div>
                                        <!--end::Label-->
                                        <!--begin::Select-->
                                        <select class="form-select form-select-transparent text-dark fs-7 lh-1 fw-bolder py-0 ps-3 w-auto" data-control="select2" data-hide-search="true" data-dropdown-css-class="w-150px" data-placeholder="Select an option" data-kt-table-widget-4="filter_status" name="role_search" id="role_search" >
                                            <option></option>
                                            <option value=" " selected="selected">Show All</option>
                                            <option value="1">Super Admin</option>
                                            <option value="2">Admin</option>
                                            <option value="3">User</option>
                                        </select>
                                        <!--end::Select-->
                                    </div>
                                    <!--end::Profile-->
                                    <!--begin::Profile-->
                                    <div class="d-flex align-items-center fw-bolder">
                                        <!--begin::Label-->
                                        <div class="text-muted fs-7 me-2">Profile</div>
                                        <!--end::Label-->
                                        <!--begin::Select-->
                                        <select class="form-select form-select-transparent text-dark fs-7 lh-1 fw-bolder py-0 ps-3 w-auto" data-control="select2" data-hide-search="true" data-dropdown-css-class="w-150px" data-placeholder="Select an option" data-kt-table-widget-4="filter_status" name="profile_search" id="profile_search" >
                                            <option></option>
                                            <option value=" " selected="selected">Show All</option>
                                            <option value="1">Verified</option>
                                            <option value="0">Pending</option>
                                            <option value="2">In Complete</option>
                                        </select>
                                        <!--end::Select-->
                                    </div>
                                    <!--end::Profile-->
                                    <!--begin::Progress-->
                                    <div class="d-flex align-items-center fw-bolder">
                                        <!--begin::Label-->
                                        <div class="text-muted fs-7 me-2">Progress</div>
                                        <!--end::Label-->
                                        <!--begin::Select-->
                                        <select class="form-select form-select-transparent text-dark fs-7 lh-1 fw-bolder py-0 ps-3 w-auto" data-control="select2" data-hide-search="true" data-dropdown-css-class="w-150px" data-placeholder="Select an option" data-kt-table-widget-4="filter_status" name="progress_search" id="progress_search" >
                                            <option></option>
                                            <option value=" " selected="selected">Show All</option>
                                            <option value="1">Approved</option>
                                            <option value="0">Pending</option>
                                        </select>
                                        <!--end::Select-->
                                    </div>
                                    <!--end::Progress-->
                                    <!--begin::Status-->
                                    <div class="d-flex align-items-center fw-bolder">
                                        <!--begin::Label-->
                                        <div class="text-muted fs-7 me-2">Status</div>
                                        <!--end::Label-->
                                        <!--begin::Select-->
                                        <select class="form-select form-select-transparent text-dark fs-7 lh-1 fw-bolder py-0 ps-3 w-auto" data-control="select2" data-hide-search="true" data-dropdown-css-class="w-150px" data-placeholder="Select an option" data-kt-table-widget-4="filter_status" name="status_search" id="status_search" >
                                            <option></option>
                                            <option value=" " selected="selected">Show All</option>
                                            <option value="0">Active</option>
                                            <option value="1">Locked</option>
                                        </select>
                                        <!--end::Select-->
                                    </div>
                                    <!--end::Status-->
                                    <!--begin::Search-->
                                    <div class="position-relative my-1">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                        <span class="svg-icon svg-icon-2 position-absolute top-50 translate-middle-y ms-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                                                <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <input type="text"  class="form-control w-150px fs-7 ps-12" placeholder="Search" name="search" id="search" />
                                    </div>
                                    <!--end::Search-->
                                </div>
                                <!--begin::Filters-->
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body py-3">
                            <!--begin::Table container-->
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                    <!--begin::Table head-->
                                    <thead>
                                        <tr class="fw-bolder text-muted">
                                            <th class="">USER</th>
                                            <th class="">ROLE</th>
                                            <th class="">NEXT PAYMENT</th>
                                            <th class="" style="width:17%;">REFFERAL AMOUNT</th>
                                            <th class="">TOTAL PAYMENT</th>
                                            <th class="">PROFILE</th>
                                            <th class="">PROGRESS</th>
                                            <th class="">STATUS</th>
                                            <th class="">ACTIONS</th>
                                        </tr>
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody class="user_table">
                                        @foreach($users as $user)
                                        
                                            <tr>        
                                                <td class="">

                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-45px me-5">
                                                            @php
                                                                $user_detail = App\Models\UserDetail::where('user_id',$user->id)->first();
                                                            @endphp
                                                            @if($user_detail != NULL)
                                                                <img src="{{ $user_detail->avatar}}" alt="" />
                                                            @else
                                                            <img src="{{ asset('public/assets/media/avatars/blank.png') }}" alt="" />
                                                            @endif
                                                        </div>
                                                        <div class="d-flex justify-content-start flex-column">
                                                            <a href="{{route('user', ['id' => $user->id])}}" class="text-dark fw-bolder text-hover-primary fs-6">{{$user->first_name}} {{$user->last_name}}</a>
                                                            <span class="text-muted fw-bold text-muted d-block fs-7">#{{$user->id}}</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="">
                                                    {{$user->role->name}}
                                                </td>

                                                @php
                                                    $result=[];
                                                    $smartfinance_ids = App\Models\Smartfinance::where('user_id',$user->id)->get();
                                                    foreach($smartfinance_ids as $smartfinance_id){
                                                        $result[] = $smartfinance_id->id;
                                                    }
                                                    $payment_date = App\Models\SmartfinancePayment::whereIn('smartfinance_id',$result)->where('is_status',0)->orderBy('payment_date', 'asc')->first();
                                                @endphp

                                                @if($payment_date != Null)
                                                    <td>
                                                        @php
                                                        $payment_amount = 0;
                                                        $amounts = App\Models\SmartfinancePayment::join('smartfinances','smartfinance_payments.smartfinance_id','=','smartfinances.id')->where('smartfinance_payments.payment_date',$payment_date->payment_date)->where('smartfinances.user_id',$user->id)->where('smartfinances.plan_id','!=',3)->select('smartfinance_payments.*')->get();

                                                        foreach($amounts as $amount){
                                                            $payment_amount = $payment_amount + $amount->amount;
                                                        }

                                                        $payment_yms = App\Models\SmartfinancePayment::join('smartfinances','smartfinance_payments.smartfinance_id','=','smartfinances.id')->where('smartfinance_payments.payment_date',$payment_date->payment_date)->where('smartfinances.user_id',$user->id)->where('smartfinances.plan_id','=',3)->groupBy('smartfinance_payments.smartfinance_id')->select('smartfinance_payments.*')->get();

                                                        foreach($payment_yms as $payment_ym){

                                                            $payment_m = App\Models\SmartfinancePayment::where('smartfinance_id',$payment_ym->smartfinance_id)->orderBy('id','Desc')->first();
                                                            $payment_amount = $payment_amount + $payment_m->next_amount + $payment_m->intrest + $payment_m->balance;
                                                        }


                                                        @endphp

                                                        Rs. {{$user->commafun($payment_amount)}}
                                                    </td>
                                                @else
                                                    <td>-</td>
                                                @endif
                                                @php
                                                    $refferal = App\Models\Refferal::where('user_id',$user->id)->first();
                                                @endphp
                                                
                                                @if($refferal != NULL)
                                                    @php
                                                        $refferal_amount = App\Models\UserAmount::where([['user_id',$user->id],['is_status',0]])->orderBy('id','Desc')->first();
                                                    @endphp
                                                    @if($refferal_amount != NULL)
                                                    <td>
                                                    <div class="row">
                                                        <div class="col-md-9 text-start">
                                                            <input type="number" class="form-control form-control-solid" placeholder="Amount" name="refferal_amount" id="refferal_amount{{$user->id}}" value="{{$refferal_amount->amount}}" style="width:100%;" />
                                                        </div>
                                                        <div class="col-md-3 text-end">
                                                            <button type="button" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" name="button_reffer" data-system_id="{{$user->id}}">
                                                                <i class="fa fa-check-circle" style="font-size:14px"></i> 
                                                            </button>    
                                                        </div>
                                                                
                                                        <div class=" refferal_amount_error{{$user->id}}" id="refferal_amount_error"></div>
                                                    </div>
                                                    </td>
                                                    @else
                                                    <td>
                                                    <div class="row">
                                                        <div class="col-md-9 text-start">
                                                            <input type="number" class="form-control form-control-solid" placeholder="Amount" name="refferal_amount" id="refferal_amount{{$user->id}}" style="width:100%;" />
                                                        </div>
                                                        <div class="col-md-3 text-end">
                                                            <button type="button" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" name="button_reffer" data-system_id="{{$user->id}}">
                                                                <i class="fa fa-check-circle" style="font-size:14px"></i>
                                                                        
                                                            </button>
                                                        </div>
                                                                
                                                        <div class=" refferal_amount_error{{$user->id}}" id="refferal_amount_error"></div>
                                                    </div>
                                                    </td>
                                                    @endif
                                                @else
                                                   <td> - </td>
                                                @endif
                                                @php
                                                    $refferal_amount = App\Models\UserAmount::where([['user_id',$user->id],['is_status',0]])->first();
                                                @endphp
                                                <td>
                                                    @if($refferal_amount != NULL)
                                                        @if($payment_date != Null)
                                                            @php
                                                            $payment_amount = 0;
                                                            $amounts = App\Models\SmartfinancePayment::join('smartfinances','smartfinance_payments.smartfinance_id','=','smartfinances.id')->where('smartfinance_payments.payment_date',$payment_date->payment_date)->where('smartfinances.user_id',$user->id)->where('smartfinances.plan_id','!=',3)->select('smartfinance_payments.*')->get();

                                                            foreach($amounts as $amount){
                                                                $payment_amount = $payment_amount + $amount->amount;
                                                            }
                                                            $payment_yms = App\Models\SmartfinancePayment::join('smartfinances','smartfinance_payments.smartfinance_id','=','smartfinances.id')->where('smartfinance_payments.payment_date',$payment_date->payment_date)->where('smartfinances.user_id',$user->id)->where('smartfinances.plan_id','=',3)->groupBy('smartfinance_payments.smartfinance_id')->select('smartfinance_payments.*')->get();

                                                            foreach($payment_yms as $payment_ym){

                                                                $payment_m = App\Models\SmartfinancePayment::where('smartfinance_id',$payment_ym->smartfinance_id)->orderBy('id','Desc')->first();
                                                                $payment_amount = $payment_amount + $payment_m->next_amount + $payment_m->intrest + $payment_m->balance;
                                                            }
                                                            @endphp

                                                            Rs. {{$user->commafun($payment_amount+$refferal_amount->amount)}}
                                                        @else
                                                            Rs. {{$user->commafun($refferal_amount->amount)}}
                                                        @endif
                                                    @elseif($payment_date != Null)
                                                        @php
                                                        $payment_amount = 0;
                                                        $amounts = App\Models\SmartfinancePayment::join('smartfinances','smartfinance_payments.smartfinance_id','=','smartfinances.id')->where('smartfinance_payments.payment_date',$payment_date->payment_date)->where('smartfinances.user_id',$user->id)->where('smartfinances.plan_id','!=',3)->select('smartfinance_payments.*')->get();

                                                        foreach($amounts as $amount){
                                                            $payment_amount = $payment_amount + $amount->amount;
                                                        }

                                                        $payment_yms = App\Models\SmartfinancePayment::join('smartfinances','smartfinance_payments.smartfinance_id','=','smartfinances.id')->where('smartfinance_payments.payment_date',$payment_date->payment_date)->where('smartfinances.user_id',$user->id)->where('smartfinances.plan_id','=',3)->groupBy('smartfinance_payments.smartfinance_id')->select('smartfinance_payments.*')->get();

                                                        foreach($payment_yms as $payment_ym){

                                                            $payment_m = App\Models\SmartfinancePayment::where('smartfinance_id',$payment_ym->smartfinance_id)->orderBy('id','Desc')->first();
                                                            $payment_amount = $payment_amount + $payment_m->next_amount + $payment_m->intrest + $payment_m->balance;
                                                        }
                                                        @endphp
                                                        Rs. {{$user->commafun($payment_amount)}}
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td class="">
                                                    @if($user->is_profile_verified == 2)
                                                        <span class="badge py-3 px-4 fs-7 badge-light-primary">Incomplete</span>
                                                    @elseif($user->is_profile_verified == 0 || $user->is_profile_updated == 1)
                                                        <span class="badge py-3 px-4 fs-7 badge-light-warning">Pending</span>
                                                    @elseif($user->is_profile_verified == 3)
                                                        <span class="badge py-3 px-4 fs-7 badge-light-danger">Rejected</span>
                                                    @else
                                                        <span class="badge py-3 px-4 fs-7 badge-light-success">Verified</span>
                                                    @endif
                                                </td>
                                                <td class="">
                                                    @if($user->is_active == 0)
                                                        <span class="badge py-3 px-4 fs-7 badge-light-warning">Pending</span>
                                                    @elseif($user->is_active == 3)
                                                        <span class="badge py-3 px-4 fs-7 badge-light-danger">Rejected</span>
                                                    @else
                                                        <span class="badge py-3 px-4 fs-7 badge-light-success">Approved</span>
                                                    @endif
                                                </td>
                                                <td class="">
                                                    @if($user->is_lock == 0)
                                                        <span class="badge py-3 px-4 fs-7 badge-light-success">Active</span>
                                                    @else
                                                        <span class="badge py-3 px-4 fs-7 badge-light-danger">Locked</span>
                                                    @endif
                                                </td>
                                                @php
                                                    $refferals = App\Models\Refferal::where('user_id',$user->id)->first();
                                                @endphp

                                                @if($user->role_id == 1)
                                                    <td class="">
                                                        <div class=" flex-shrink-0">
                                                            <button type="button"  class="btn  btn-light mb-5" onclick="super_admin()"><i class="fas fa-pencil-alt" id="fa"></i></button>
                                                            @if($user->is_reffer == 1)
                                                                <button type="button" id="kt_sign_in_submit" class="btn  btn-light mb-5" data-system_id="{{$user->id}}" name="reffer"><i class="fa fa-user-plus" id="fa"></i></button>
                                                            @endif
                                                        </div>
                                                    </td>
                                                @else
                                                    <td class="">
                                                        <div class=" flex-shrink-0">
                                                            <button type="button" id="kt_sign_in_submit" class="btn  btn-light mb-5" data-system_id="{{$user->id}}" name="edit"><i class="fas fa-pencil-alt" id="fa"></i></button> 
                                                            @if($user->is_reffer == 1)
                                                                <button type="button" id="kt_sign_in_submit" class="btn  btn-light mb-5" data-system_id="{{$user->id}}" name="reffer"><i class="fa fa-user-plus" id="fa" ></i></button>
                                                            @endif
                                                        </div>
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                                <!--end::Table-->
                                <div class="d-flex justify-content-end mb-3">
                                    {{ $users->links() }}
                                </div>
                                
                            </div>
                            <!--end::Table container-->
                        </div>
                        <!--begin::Body-->
                    </div>
                    <!--end::Tables Widget 9-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row gy-5 g-xl-8 mt-xl-5" id="finance" style="display:none;">
                <div class="col-xl-12 mb-5 mb-xl-10">
                    <!--begin::Table Widget 4-->
                    <div class="card card-flush h-xl-100">
                        <!--begin::Card header-->
                        <div class="card-header pt-7">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder text-dark">Recent Transactions</span>
                                <!-- <span class="text-gray-400 mt-1 fw-bold fs-6">Avg 100 Transactions processed per day</span> -->
                            </h3>
                            <!--end::Title-->
                            <!--begin::Actions-->
                            <div class="card-toolbar">
                                <!--begin::Filters-->
                                <div class="d-flex flex-stack flex-wrap gap-4">
                                    <!--begin::Destination-->
                                    <!--end::Destination-->
                                    <!--begin::Status-->
                                    <div class="d-flex align-items-center fw-bolder">

                                        <!--begin::Label-->
                                        <div class="text-muted fs-7 me-2">Plan</div>
                                        <!--end::Label-->
                                        <!--begin::Select-->
                                        <select class="form-select form-select-transparent text-dark fs-7 lh-1 fw-bolder py-0 ps-3 w-auto" data-control="select2" data-hide-search="true" data-dropdown-css-class="w-150px" data-placeholder="Show All" data-kt-table-widget-4="filter_status" name="investment_plan" id="investment_plan" >
                                            <option></option>
                                            <option value=" " selected="selected">Show All</option>
                                            <option value="year">Year</option>
                                            <option value="month">Month</option>
                                            
                                        </select>
                                        <!--end::Select-->

                                        <!--begin::Label-->
                                        <div class="text-muted fs-7 me-2">Status</div>
                                        <!--end::Label-->
                                        <!--begin::Select-->
                                        <select class="form-select form-select-transparent text-dark fs-7 lh-1 fw-bolder py-0 ps-3 w-auto" data-control="select2" data-hide-search="true" data-dropdown-css-class="w-150px" data-placeholder="Show All" data-kt-table-widget-4="filter_status" name="investment_status" id="investment_status" >
                                            <option></option>
                                            <option value=" " selected="selected">Show All</option>
                                            <option value="2">Pending</option>
                                            <option value="1">Approved</option>
                                            <option value="0">Rejected</option>
                                        </select>
                                        <!--end::Select-->
                                    </div>
                                    <!--end::Status-->


                                    <!--begin::Search-->
                                    <div class="position-relative my-1">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                        <span class="svg-icon svg-icon-2 position-absolute top-50 translate-middle-y ms-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                                                <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <input type="text" data-kt-table-widget-4="search" class="form-control w-150px fs-7 ps-12" placeholder="Search" name="investment_search" />
                                    </div>
                                    <!--end::Search-->
                                </div>
                                <!--begin::Filters-->
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body">
                            <!--begin::Table-->
                            <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                <!--begin::Table head-->
                                <thead>
                                    <!--begin::Table row-->
                                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                        <th class="">CUSTOMER</th>
                                        <th class="">PLAN</th>
                                        <th class="">INVESTMENT YEAR</th>
                                        <th class="">TOTAL AMOUNT INVESTED</th>
                                        <th class="">INVESTMENT DATE</th>
                                        <th class="">APPROVED DATE</th>
                                        <th class="">RATE OF INTEREST</th>
                                        <th class="">NEXT PAYMENT</th>
                                        <th class="">EXPIRY</th>
                                        <th class="">STATUS</th>
                                        <th class="">ACTION</th>               
                                    </tr>
                                    <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                    <tbody class="fw-bolder text-gray-600 investment_body">
                                        @foreach($smartfinances as $smartfinance)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="symbol symbol-45px me-5">
                                                        @php
                                                            $avatar = App\Models\UserDetail::where('user_id',$smartfinance->user->id)->first();
                                                        @endphp
                                                        @if($avatar != NULL)
                                                        <img src="{{ $avatar->avatar}}" alt="" />
                                                        @endif
                                                    </div>
                                                    <div class="d-flex justify-content-start flex-column">
                                                        <a href="{{route('user', ['id' => $smartfinance->user->id])}}" class="text-dark fw-bolder text-hover-primary fs-6">{{$smartfinance->user->first_name}} {{$smartfinance->user->last_name}}</a>
                                                        <span class="text-muted fw-bold text-muted d-block fs-7">#{{$smartfinance->user->id}}</span>
                                                    </div>
                                                </div>
                                            </td>
                                            
                                            <td class="">{{$smartfinance->plan->name}}</td>
                                            <td>
                                                @if($smartfinance->no_of_year != Null)
                                                    {{$smartfinance->no_of_year}}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            @if($smartfinance->plan_id == 3)
                                                @php
                                                    $payment_dates = App\Models\SmartfinancePayment::where([['smartfinance_id',$smartfinance->id],['is_approve',1]])->get();
                                                    $amount=0;
                                                    foreach($payment_dates as $payment_date){
                                                        $amount = $amount+ $payment_date->investment_amount;
                                                    }
                                                @endphp

                                                <td>Rs {{$smartfinance->commafun($amount)}}</td>
                                            @else
                                                <td class="">Rs {{$smartfinance->commafun($smartfinance->amount)}}
                                                </td>
                                            @endif
                                            <td class="">
                                               @php
                                               $date = Carbon\Carbon::parse($smartfinance->investment_date)->formatLocalized('%d %b %Y');
                                               @endphp
                                               {{$date}}
                                            </td>
                                            @if($smartfinance->accepted_date != NULL)
                                                <td>
                                                    @php
                                                        $date = Carbon\Carbon::parse($smartfinance->accepted_date)->formatLocalized('%d %b %Y');
                                                    @endphp
                                                    {{$date}}
                                                </td>
                                            @else
                                                <td>-</td>
                                            @endif
                                            @if($smartfinance->percentage != NULL)
                                                <td>{{$smartfinance->percentage}}</td>
                                            @else
                                                <td>-</td>
                                            @endif
                                            @php
                                                $payment_date = App\Models\SmartfinancePayment::where([['smartfinance_id',$smartfinance->id],['is_status',0]])->first();
                                                $date = Carbon\Carbon::now()->format('Y-m-d');
                                            @endphp

                                            @if($payment_date != Null)
                                                <td>
                                                    @if($payment_date->smartfinance->plan->id == 3)
                                                        @if($date == $payment_date->payment_date)
                                                            @php
                                                            $payment_ym = App\Models\SmartfinancePayment::where('smartfinance_id',$smartfinance->id)->orderBy('id','Desc')->first();
                                                            @endphp
                                                            
                                                            Rs. {{$smartfinance->commafun($payment_ym->intrest + $payment_ym->next_amount + $payment_ym->balance)}}
                                                        @else
                                                            -
                                                        @endif
                                                    @else
                                                    Rs. {{$smartfinance->commafun($payment_date->amount)}}
                                                    @endif
                                                </td>
                                            @else
                                                <td>-</td>
                                            @endif
                                            @php
                                                $payment_date = App\Models\SmartfinancePayment::where([['smartfinance_id',$smartfinance->id],['is_status',0]])->orderBy('id','Desc')->first();
                                            @endphp
                                            @if($payment_date != Null)
                                                <td>
                                                    @php
                                                        $date = Carbon\Carbon::parse($payment_date->payment_date)->formatLocalized('%d %b %Y');
                                                    @endphp
                                                    @php
                                                        $new_date = Carbon\Carbon::parse($payment_date->payment_date)->subMonths(2)->format('Y-m-d');
                                                        $now = Carbon\Carbon::now()->format('Y-m-d');
                                                    @endphp
                                                    @if($new_date <= $now)
                                                        <span class="badge py-3 px-4 fs-7 badge-light-danger">{{$date}}</span>
                                                    @else
                                                        <span class="badge py-3 px-4 fs-7 badge-light-success">{{$date}}</span>
                                                    @endif
                                                </td>
                                            @else
                                                @php
                                                    $payment_date = App\Models\SmartfinancePayment::where([['smartfinance_id',$smartfinance->id],['is_status',1]])->orderBy('id','Desc')->first();
                                                @endphp
                                                @if($payment_date != Null)
                                                    <td><span class="badge py-3 px-4 fs-7 badge-secondary">Expired</span></td>
                                                @else
                                                    <td>-</td>
                                                @endif

                                                
                                            @endif
                                            
                                            @if($smartfinance->plan_id == 3)
                                                @php
                                                    $payment = App\Models\SmartfinancePayment::where([['smartfinance_id',$smartfinance->id],['is_approve',2]])->first();
                                                @endphp

                                                @if($payment != null)

                                                    @if($smartfinance->is_status == 2||$payment->is_approve == 2)
                                                        <td><span class="badge py-3 px-4 fs-7 badge-light-warning">Pending</span></td>
                                                    @elseif($smartfinance->is_status == 1)
                                                        <td><span class="badge py-3 px-4 fs-7 badge-light-success">Approved</span></td>
                                                    @elseif($smartfinance->is_status == 0)
                                                        <td><span class="badge py-3 px-4 fs-7 badge-light-danger">Rejected</span></td>
                                                    @endif
                                                @else
                                                    @if($smartfinance->is_status == 2)
                                                        <td><span class="badge py-3 px-4 fs-7 badge-light-warning">Pending</span></td>
                                                    @elseif($smartfinance->is_status == 1)
                                                        <td><span class="badge py-3 px-4 fs-7 badge-light-success">Approved</span></td>
                                                    @elseif($smartfinance->is_status == 0)
                                                        <td><span class="badge py-3 px-4 fs-7 badge-light-danger">Rejected</span></td>
                                                    @endif
                                                @endif
                                            @else
                                                @if($smartfinance->is_status == 2)
                                                    <td><span class="badge py-3 px-4 fs-7 badge-light-warning">Pending</span></td>
                                                @elseif($smartfinance->is_status == 1)
                                                    <td><span class="badge py-3 px-4 fs-7 badge-light-success">Approved</span></td>
                                                @elseif($smartfinance->is_status == 0)
                                                    <td><span class="badge py-3 px-4 fs-7 badge-light-danger">Rejected</span></td>
                                                @endif 
                                            @endif 

                                            <td class="">

                                                <button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary"name="approve" data-system_id="{{$smartfinance->id}}" title="Edit"><i class="fas fa-pencil-alt" id="fa"></i></button>
                                                
                                                <a class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" href="{{route('view_finance', ['id' => $smartfinance->id])}}">
                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                                                    <span class="svg-icon svg-icon-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="black"></rect>
                                                            <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="black"></path>
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                <!--end::Table body-->
                            </table>
                            <!--end::Table-->
                            
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Table Widget 4-->
                </div>
            </div>
            <!--end::Row-->
            <div id="admin_finance" id="admin_finance" style="display:none;">
                @if($admin_finance_count != 0)
                    <div class="row gy-5 g-xl-8 mt-xl-5" >
                        <div class="col-xl-12 mb-5 mb-xl-10">
                            <!--begin::Table Widget 4-->
                            <div class="card card-flush h-xl-100">
                                <!--begin::Card header-->
                                <div class="card-header pt-7">
                                    <!--begin::Title-->
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label fw-bolder text-dark">My  Transactions</span>

                                    </h3>
                                    <!--end::Title-->
                                    <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="Next Investment">
                                        <a class="btn btn-sm btn-light btn-active-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_start_investment" >
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                            <span class="svg-icon svg-icon-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
                                                    <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->Next Investment 
                                        </a>
                                    </div>
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body">
                                    <!--begin::Table-->
                                    <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                        <!--begin::Table head-->
                                        <thead>
                                            <!--begin::Table row-->
                                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                <th class="">CUSTOMER</th>
                                                <th class="">PLAN</th>
                                                <th class="">INVESTMENT YEAR</th>
                                                <th class="">TOTAL AMOUNT INVESTED</th>
                                                <th class="">INVESTMENT DATE</th>
                                                <th class="">APPROVED DATE</th>
                                                <th class="">RATE OF INTEREST</th>
                                                <th class="">NEXT PAYMENT</th>
                                                <th class="">EXPIRY</th>
                                                <th class="">STATUS</th>
                                                <th class="">ACTION</th>               
                                            </tr>
                                            <!--end::Table row-->
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody class="fw-bolder text-gray-600 investment_body">
                                            @foreach($admin_finances as $admin_finance)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-45px me-5">
                                                            @php
                                                            $avatar = App\Models\UserDetail::where('user_id',$admin_finance->user->id)->first();
                                                            @endphp
                                                            @if($avatar != NULL)
                                                            <img src="{{ $avatar->avatar}}" alt="" />
                                                            @endif
                                                        </div>
                                                        <div class="d-flex justify-content-start flex-column">
                                                            <a href="{{route('user', ['id' => $admin_finance->user->id])}}" class="text-dark fw-bolder text-hover-primary fs-6">{{$admin_finance->user->first_name}} {{$admin_finance->user->last_name}}</a>
                                                            <span class="text-muted fw-bold text-muted d-block fs-7">#{{$admin_finance->user->id}}</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                @php
                                                $plan = App\Models\Plan::where('id',$admin_finance->plan_id)->first();
                                                @endphp
                                                @if($plan != Null)
                                                @if($plan->type == 'month')
                                                <td class="">Month</td>
                                                @else
                                                <td class="">Year</td>
                                                @endif
                                                @endif
                                                <td>
                                                    @if($admin_finance->no_of_year != Null)
                                                    {{$admin_finance->no_of_year}}
                                                    @else
                                                    -
                                                    @endif
                                                </td>
                                                @if($admin_finance->plan_id == 3)
                                                    @php
                                                        $payment_dates = App\Models\SmartfinancePayment::where([['smartfinance_id',$admin_finance->id],['is_approve',1]])->get();
                                                        $amount=0;
                                                        foreach($payment_dates as $payment_date){
                                                            $amount = $amount+ $payment_date->investment_amount;
                                                        }
                                                    @endphp
                                                    <td>Rs {{$payment_date->commafun($amount)}}</td>
                                                @else
                                                    <td class="">Rs {{$payment_date->commafun($admin_finance->amount)}}</td>
                                                @endif
                                                <td class="">
                                                    {{$admin_finance->investment_date}}
                                                </td>
                                                @if($admin_finance->accepted_date != NULL)
                                                <td>{{$admin_finance->accepted_date}}</td>
                                                @else
                                                <td>-</td>
                                                @endif
                                                @if($admin_finance->percentage != NULL)
                                                <td>{{$admin_finance->percentage}}</td>
                                                @else
                                                <td>-</td>
                                                @endif
                                                
                                                @php
                                                $payment_date = App\Models\SmartfinancePayment::where([['smartfinance_id',$admin_finance->id],['is_status',0]])->first();
                                                @endphp
                                                @if($payment_date != Null)
                                                <td>
                                                    @php
                                                    $date = Carbon\Carbon::parse($payment_date->payment_date)->formatLocalized('%d %b %Y');
                                                    @endphp

                                                    @if($payment_date->smartfinance->plan->id == 3)
                                                        @if($payment_date->month == 1)
                                                            -
                                                        @else
                                                            Rs. {{$payment_date->commafun($payment_date->intrest)}}
                                                        @endif
                                                    @else
                                                        Rs. {{$payment_date->commafun($payment_date->amount)}}
                                                    @endif

                                                    
                                                </td>
                                                @else
                                                <td>-</td>
                                                @endif
                                                @php
                                                $payment_date = App\Models\SmartfinancePayment::where([['smartfinance_id',$admin_finance->id],['is_status',0]])->orderBy('id','Desc')->first();
                                                @endphp
                                                @if($payment_date != Null)
                                                <td>
                                                    @php
                                                    $date = Carbon\Carbon::parse($payment_date->payment_date)->formatLocalized('%d %b %Y');
                                                    @endphp
                                                    @php
                                                    $new_date = Carbon\Carbon::parse($payment_date->payment_date)->subMonths(2)->format('Y-m-d');
                                                    $now = Carbon\Carbon::now()->format('Y-m-d')
                                                    @endphp
                                                    @if($new_date <= $now)
                                                    <span class="badge py-3 px-4 fs-7 badge-light-danger">{{$date}}</span>
                                                    @else
                                                    <span class="badge py-3 px-4 fs-7 badge-light-success">{{$date}}</span>
                                                    @endif
                                                </td>
                                                @else
                                                <td>-</td>
                                                @endif

                                                @if($admin_finance->is_status == 2)
                                                <td><span class="badge py-3 px-4 fs-7 badge-light-warning">Pending</span></td>
                                                @elseif($admin_finance->is_status == 1)
                                                <td><span class="badge py-3 px-4 fs-7 badge-light-success">Approved</span></td>
                                                @elseif($admin_finance->is_status == 0)
                                                <td><span class="badge py-3 px-4 fs-7 badge-light-danger">Rejected</span></td>
                                                @endif      
                                                <td class="">

                                                    <button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary"name="approve" data-system_id="{{$admin_finance->id}}" title="Edit"><i class="fas fa-pencil-alt" id="fa"></i></button>
                                                    
                                                    <a class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" href="{{route('view_finance', ['id' => $admin_finance->id])}}">
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                                                        <span class="svg-icon svg-icon-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="black"></rect>
                                                                <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="black"></path>
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                    <!--end::Table-->
                                    <div class="d-flex justify-content-end mb-3">
                                        {{ $admin_finances->links() }}
                                    </div>
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Table Widget 4-->

                        </div>
                    </div>
                @else
                    <!--begin::Row-->
                    <div class="row gy-5 g-xl-8 mt-xl-5" >
                        <div class="col-xl-12 mb-5 mb-xl-10">
                            <!--begin::Table Widget 4-->
                            <div class="card card-flush h-xl-100">
                                <!--begin::Card body-->
                                <div class="card-body">
                                    <!--begin::Heading-->
                                    <div class="card-px text-center pt-15 pb-15">
                                        <!--begin::Title-->
                                        <h2 class="fs-2x fw-bolder mb-0">Start Your Investment </h2>
                                        <!--end::Title-->
                                        <!--begin::Description-->
                                        <p class="text-gray-400 fs-4 fw-bold py-7">Click on the below button to start your investment </p>
                                        <!--end::Description-->
                                        <!--begin::Action-->
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_start_investment" style="color: white;">Start Investment</button>
                                        <!--end::Action-->
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Illustration-->
                                    <div class="text-center pb-15 px-5">
                                        <img src="{{ asset('public/assets/media/illustrations/sigma-1/11.png') }}" alt="" class="mw-100 h-200px h-sm-325px" />
                                    </div>
                                    <!--end::Illustration-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Table Widget 4-->
                        </div>
                    </div>
                    <!--end::Row-->
                @endif
            </div>
        @elseif($detail)
            <div class="row">
                <div class="card">
                    <!--begin::Card body-->
                    <div class="card-body">
                        <!--begin::Heading-->
                        <div class="card-px text-center pt-15 pb-15">
                            <!--begin::Title-->
                            <h2 class="fs-2x fw-bolder mb-0">Profile Status</h2>
                            <!--end::Title-->
                            <!--begin::Description-->
                            <p class="text-gray-400 fs-4 fw-bold py-7">Your profile is under verification</p>
                            <!--end::Description-->
                            
                        </div>
                        <!--end::Heading-->
                        <!--begin::Illustration-->
                        <div class="text-center pb-15 px-5">
                            <img src="{{ asset('public/assets/media/illustrations/sigma-1/17.png') }}" alt="" class="mw-100 h-200px h-sm-325px" />
                        </div>
                            <!--end::Illustration-->
                    </div>
                        <!--end::Card body-->
                </div>
            </div> 
        @else
            <div class="row">
                <div class="card">
                    <!--begin::Card body-->
                    <div class="card-body">
                        <!--begin::Heading-->
                        <div class="card-px text-center pt-15 pb-15">
                            <!--begin::Title-->
                            <h2 class="fs-2x fw-bolder mb-0">Create a Profile</h2>
                            <!--end::Title-->
                            <!--begin::Description-->
                            <p class="text-gray-400 fs-4 fw-bold py-7">Click on the below button to create your profile </p>
                            <!--end::Description-->
                            <!--begin::Action-->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_project" style="color: white;">Create Profile</button>
                                <!--end::Action-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Illustration-->
                        <div class="text-center pb-15 px-5">
                            <img src="{{ asset('public/assets/media/illustrations/sigma-1/6.png') }}" alt="" class="mw-100 h-200px h-sm-325px" />
                        </div>
                            <!--end::Illustration-->
                    </div>
                        <!--end::Card body-->
                </div>
            </div>
        @endif
    </div>
    <!--end::Post-->
</div>
<!--end::Container-->

@php
    $user = Auth::guard('web')->user();
@endphp

<!-- begin::Modal -investment- -->
<div class="modal fade" id="kt_modal_start_investment" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-scrollable mw-800px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header pb-0 border-0 justify-content-end">
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--begin::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
                <!--begin::Heading-->

                <!--end::Google Contacts Invite-->
                <!--begin::Separator-->
                <!--end::Separator-->
                <!--begin::Textarea-->
                <!--end::Textarea-->
                <!--begin::Users-->
                <div class="mb-10">
                    <!--begin::Heading-->
                    <div class="fs-4 fw-bolder mb-2">Smart Finance</div>
                    <!--end::Heading-->
                    <form class="form w-100" novalidate="novalidate" id="selectform" method="post" action="{{route('store_smart_finance')}}" enctype="multipart/form-data">
                        @csrf

                        <!--begin::Input group-->
                        <div class="fv-row mb-8">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                <span class="required">Investment Amount</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Investment Amount"></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="number" class="form-control form-control-solid @error('amount') is-invalid @enderror" placeholder="Investment Amount" value="" name="amount" id="amount" />
                            <!--end::Input-->
                            <div class=" amount_error" id="amount_error"></div>
                            @error('amount')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-8">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                <span class="required">Select Your Plan</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Plan"></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true" name="plan" id="plan">
                                <option value="">Select</option>
                                <option value="month">Month</option>
                                <option value="year">Year</option>

                            </select>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-8" id="plan_type" style="display:none;">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                <span class="required">Select Your Plan Type</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Plan Type"></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select class="form-select form-select-solid form-select-sm @error('plan_id') is-invalid @enderror" data-control="select2" data-hide-search="true" name="plan_id" id="plan_id">
                                <option value="">Select</option>
                            </select>
                            @error('plan_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-8" id="year" style="display:none;">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                <span class="required">Investment Years</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Year"></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select class="form-select form-select-solid form-select-sm " data-control="select2" data-hide-search="true" name="year" id="year">
                                <option value="">Select</option>
                               @for ($i = 2; $i <= 10; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                            
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-8">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                <span class="required">Payment Receipt</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Payment Receipt"></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="file" class="form-control form-control-solid custom-file-input @error('amount') is-invalid @enderror" id="bill" placeholder="Payment Receipt" value="" name="bill" accept="image/*" />
                            <div class="d-flex justify-content-center mt-3" >
                                <img id="preview-image-bill" style="max-height: 200px;">
                                <a href="#" class="text-hover-primary" onclick="delete_bill()"  style="display:none;" id="bill_image">X</a>
                            </div>

                            <!--end::Input-->
                            @error('bill')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!--end::Input group-->

                        <div class="fv-row mb-8 example" id="example">

                        </div>
                        
                        <div class="d-flex justify-content-center">
                            <button type="submit"  class="btn  btn-primary mt-5 mb-3">Submit</button> &nbsp;&nbsp;&nbsp;
                            <button type="button" name="reset"  class="btn  btn-warning mt-5 mb-3">Reset</button>
                            
                        </div>
                    </form>
                </div>
                <!--end::Users-->
                <!--begin::Notice-->
                <!--end::Notice-->
            </div>
            <!--end::Modal body-->
        </div>
            <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!-- end::Modal -investment- -->

<!--begin::Modal - Create Profile-->
<div class="modal fade" id="kt_modal_create_project" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-fullscreen p-9">
        <!--begin::Modal content-->
        <div class="modal-content modal-rounded">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2>Create Profile</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y m-5">
                <!--begin::Stepper-->
                <div class="stepper stepper-links d-flex flex-column" id="kt_modal_create_project_stepper">
                    <!--begin::Container-->
                    <div class="container">
                        <!--begin::Nav-->
                        <div class="stepper-nav justify-content-center py-2">
                            <!--begin::Step 1-->
                            <div class="stepper-item me-5 me-md-15 current" data-kt-stepper-element="nav" id="personal_details" >
                                <h3 class="stepper-title">Personal details</h3>
                            </div>
                            <!--end::Step 1-->
                            <!--begin::Step 2-->
                            <div class="stepper-item me-5 me-md-15  " data-kt-stepper-element="nav" id="additional_details" >
                                <h3 class="stepper-title">Additional details</h3>
                            </div>
                            <!--end::Step 2-->
                            <!--begin::Step 3-->
                            <div class="stepper-item me-5 me-md-15" data-kt-stepper-element="nav" id="bank_details">
                                <h3 class="stepper-title">Bank details</h3>
                            </div>
                            <!--end::Step 3-->
                            <!--begin::Step 4-->
                            <div class="stepper-item me-5 me-md-15 " data-kt-stepper-element="nav" id="nominee_details">
                                <h3 class="stepper-title">Nominee details</h3>
                            </div>
                            <!--end::Step 4-->
                        </div>
                        <!--end::Nav-->
                        <!--begin::Form-->
                        <form id="profile" method="POST" action="{{route('save_profile')}}" enctype="multipart/form-data">
                        @csrf
                            <div class="error" id="error">   
                            </div>
                            <!--begin::Personal-->
                            <div class="current" id="personal"data-kt-stepper-element="content">
                                <!--begin::Wrapper-->
                                <div class="w-100">
                                    <!--begin::Heading-->
                                    <div class="pb-12">
                                        <!--begin::Title-->
                                        <h1 class="fw-bolder text-dark">Personal details</h1>
                                        <!--end::Title-->
                                        <!--begin::Description-->
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Input group-->
                                    <!-- <div class="fv-row mb-8"> -->
                                        <!--begin::Label-->
                                        <!-- <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span class="required">Amount To Deposit(Min 1Lakh)</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Amount To Deposit(Min 1Lakh)"></i>
                                        </label> -->
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <!-- <input type="number" class="form-control form-control-solid" placeholder="Amount To Deposit" value="" id="amount" name="amount" /> -->
                                        <!--end::Input-->
                                    <!-- </div> -->
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-8">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span class="required">Address</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Address"></i>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid" placeholder="Address" value="" name="address" id="address" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-8">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span class="required">City</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="City"></i>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid" placeholder="City" value="" name="city" id="city" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-8">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span class="required">Pincode</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Pincode"></i>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="number" class="form-control form-control-solid" placeholder="Pincode" value="" name="pincode" id="pincode" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-8">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span class="">Email</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Email"></i>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="email" class="form-control form-control-solid" placeholder="Email" name="email" id="email" value="{{$user->email}}" readonly />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <!-- <div class="fv-row mb-8"> -->
                                        <!--begin::Label-->
                                        <!-- <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span class="required">Transaction ID</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Transaction ID"></i>
                                        </label> -->
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <!-- <input type="number" class="form-control form-control-solid" placeholder="Transaction ID" value="" name="transaction_id" id="transaction_id" /> -->
                                        <!--end::Input-->
                                    <!-- </div> -->
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <!-- <div class="fv-row mb-8"> -->
                                        <!--begin::Label-->
                                        <!-- <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span class="required">Payment Copy</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Payment Copy"></i>
                                        </label> -->
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <!-- <input type="file" class="form-control form-control-solid custom-file-input" id="payment_copy" placeholder="Payment Copy" value="" name="payment_copy" accept="image/*" />
                                        <div class="d-flex justify-content-center mt-3">
                                            <img id="preview-image-payment_copy" style="max-height: 200px;">
                                        </div> -->
                                    
                                        <!--end::Input-->
                                    <!-- </div> -->
                                    <!--end::Input group-->
                                    <!--begin::Actions-->
                                    <div class="d-flex justify-content-end">
                                        <button type="button" class="btn btn-lg btn-primary"  onclick="additional_next()">Next</button>
                                    </div>
                                    <!--end::Actions-->
                                   
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Personal-->
                            <!--begin::Personal-->
                            <div class="" id="additional" data-kt-stepper-element="content">
                                <!--begin::Wrapper-->
                                <div class="w-100">
                                    <!--begin::Heading-->
                                    <div class="pb-12">
                                        <!--begin::Title-->
                                        <h1 class="fw-bolder text-dark">Additional details</h1>
                                        <!--end::Title-->
                                        <!--begin::Description-->
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-8">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span class="required">Mobile No</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Mobile No"></i>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="number" class="form-control form-control-solid" placeholder="Mobile No" name="phone" id="phone" value="{{$user->phone}}" readonly />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-8">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span class="required">Aadhaar No</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Aadhaar No"></i>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="" class="form-control form-control-solid" placeholder="Aadhaar No" value="" name="aadhaar_no" id="aadhaar_no" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-8">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span class="required">Pan Card No</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Pan Card No"></i>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid" placeholder="Pan Card No" value="" name="pan_card_no" id="pan_card_no" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-8">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span class="required">Profile Photo</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Profile Photo"></i>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="file" class="form-control form-control-solid custom-file-input" id="avatar" placeholder="Avatar" value="" name="avatar" accept="image/*" />
                                        <div class="d-flex justify-content-center mt-3">
                                            <img id="preview-image-avatar" style="max-height: 200px;">
                                        </div>
                                    
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-8">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span class="required">Aadhaar Card</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Aadhaar Card"></i>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="file" class="form-control form-control-solid custom-file-input" id="aadhaar_card" placeholder="Aadhaar Card" value="" name="aadhaar_card" accept="image/*" />
                                        <div class="d-flex justify-content-center mt-3">
                                            <img id="preview-image-aadhaar_card" style="max-height: 200px;">
                                        </div>
                                    
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-8">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span class="required">Pan Card</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Pan Card"></i>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="file" class="form-control form-control-solid custom-file-input" id="pan_card" placeholder="Pan Card" value="" name="pan_card" accept="image/*" />
                                        <div class="d-flex justify-content-center mt-3">
                                            <img id="preview-image-pan_card" style="max-height: 200px;">
                                        </div>
                                    
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->

                                    <!--begin::Actions-->
                                    <div class="d-flex flex-stack">
                                        <button type="button" class="btn btn-lg btn-primary me-3" onclick="personal_previous()">Personal Details</button>
                                        <button type="button" class="btn btn-lg btn-primary" onclick="bank_next()">Next</button>
                                    </div>
                                    <!--end::Actions-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Personal-->
                            <!--begin::Personal-->
                            <div class="" id="bank" data-kt-stepper-element="content">
                                <!--begin::Wrapper-->
                                <div class="w-100">
                                    <!--begin::Heading-->
                                    <div class="pb-12">
                                        <!--begin::Title-->
                                        <h1 class="fw-bolder text-dark">Bank Details</h1>
                                        <!--end::Title-->
                                        <!--begin::Description-->
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-8">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span class="required">Bank Account Holder Name</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Account Holder Name"></i>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid" placeholder="Account Holder Name" value="" name="holder_name" id="holder_name" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-8">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span class="required">Account No</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Account No"></i>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="number" class="form-control form-control-solid" placeholder="Account No" value="" name="account_no" id="account_no" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-8">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span class="required">IFSC Code</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="IFSC Code"></i>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid" placeholder="IFSC Code" value="" name="ifsc_code" id="ifsc_code" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-8">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span class="required">Branch</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Branch"></i>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid" placeholder="Branch" value="" name="branch" id="branch" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-8">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span class="required">City</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="City"></i>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid" placeholder="City" value="" name="city" id="city" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <!-- <div class="fv-row mb-8"> -->
                                        <!--begin::Label-->
                                        <!-- <label class="required fs-6 fw-bold mb-2">Account Type</label> -->
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <!-- <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Select..." name="type" id="type">
                                            <option value="current">Current</option>
                                            <option value="saving">Saving</option>
                                        </select> -->
                                        <!--end::Input-->
                                    <!-- </div> -->
                                    <!--end::Input group-->
                                    <!--begin::Actions-->
                                    <div class="d-flex flex-stack">
                                        <button type="button" class="btn btn-lg btn-primary me-3" onclick="additional_previous()">Additional Details</button>
                                        <button type="button" class="btn btn-lg btn-primary" onclick="nominee_next()">Next</button>
                                    </div>
                                    <!--end::Actions-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Personal-->
                            <!--begin::Personal-->
                            <div class="" id="nominee" data-kt-stepper-element="content">
                                <!--begin::Wrapper-->
                                <div class="w-100">
                                    <!--begin::Heading-->
                                    <div class="pb-12">
                                        <!--begin::Title-->
                                        <h1 class="fw-bolder text-dark">Nominee Details</h1>
                                        <!--end::Title-->
                                        <!--begin::Description-->
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-8">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span class="required">Nominee Name</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Nominee Name"></i>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid" placeholder="Nominee Name" value="" name="nominee_name" id="nominee_name" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-8">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span class="required">Relationship</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Relationship"></i>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid" placeholder="Relationship" value="" name="relationship" id="relationship" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-8">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span class="required">Nominee Age</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Nominee Age"></i>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="number" class="form-control form-control-solid" placeholder="Nominee Age" value="" name="age" id="age" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-8">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span class="required">Nominee Aadhaar Number</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Nominee Aadhaar Number"></i>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid" placeholder="Nominee Aadhaar Number" value="" name="nominee_aadhaar_no" id="nominee_aadhaar_no" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <!-- <div class="fv-row mb-8"> -->
                                        <!--begin::Label-->
                                        <!-- <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span class="required">Nominee Photo</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Nominee Photo<"></i>
                                        </label> -->
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <!-- <input type="file" class="form-control form-control-solid custom-file-input" id="nominee_photo" placeholder="Nominee Photo" value="" name="nominee_photo" accept="image/*" />
                                        <div class="d-flex justify-content-center mt-3">
                                            <img id="preview-image-nominee_photo" style="max-height: 200px;">
                                        </div> -->
                                    
                                        <!--end::Input-->
                                    <!-- </div> -->
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-8">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span class="required">Nominee Aadhar Card</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Nominee Aadhar Card<"></i>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="file" class="form-control form-control-solid custom-file-input" id="nominee_aadhar" placeholder="Nominee Aadhar Card" value="" name="nominee_aadhar" accept="image/*" />
                                        <div class="d-flex justify-content-center mt-3">
                                            <img id="preview-image-nominee_aadhar" style="max-height: 200px;">
                                        </div>
                                    
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    
                                    
                                    <!--begin::Actions-->
                                    <div class="d-flex flex-stack">
                                        <button type="button" class="btn btn-lg btn-primary me-3" onclick="bank_previous()">Bank Details</button>
                                        <button type="button" class="btn btn-lg btn-primary me-3" onclick="final()">Finish</button>
                                       
                                    </div>
                                    <!--end::Actions--><br><br>
                                    <div style="display:none;" id="submit" >
                                        <div class="alert alert-success" role="alert">
                                            <span class="d-flex justify-content-center fs-6 fw-bold">Click submit to save your data</span>
                                        </div>
                                        <div class="d-flex justify-content-center" > 
                                            <button type="submit" class="btn btn-lg btn-success" >Submit</button> 
                                        </div>
                                    </div>
                                    

                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Personal-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--begin::Container-->
                </div>
                <!--end::Stepper-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - Create Project-->

<!-- begin::Modal -->
<div class="modal fade" id="edit_modal" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header pb-0 border-0 justify-content-end">
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--begin::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
                <!--begin::Heading-->

                <!--end::Google Contacts Invite-->
                <!--begin::Separator-->
                <!--end::Separator-->
                <!--begin::Textarea-->
                <!--end::Textarea-->
                <!--begin::Users-->
                <div class="mb-10">
                    <!--begin::Heading-->
                    <div class="fs-6 fw-bold mb-2">User Management</div>
                    <!--end::Heading-->
                    <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" method="post" action="{{route('change_user_status')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user_id" id="user_id">
                        <!--begin::List-->
                        <div class="mh-300px scroll-y me-n7 pe-7">
                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-35px symbol-circle">
                                        <img alt="Pic" src="{{ asset('public/assets/media/avatars/blank.png') }}" />
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-5">
                                        <div class=""><input  type="text" readonly="" name="user_name" id="user_name" style="border: none;outline: none;"></div>
                                        <div class=""><input type="text" readonly="" name="user_email" id="user_email" style="border: none;outline: none;color: #a1a5b7;width: 100%;"></div>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->
                                
                            </div>
                        </div>
                        <!--end::List-->
                        <!--begin::List-->
                        <div class="mh-300px scroll-y me-n7 pe-7">
                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    
                                    <!--begin::Details-->
                                    <div class="ms-5">
                                        <span class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Progress</span>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->
                                <!--begin::Access menu-->
                                <div class="ms-2 w-150px">
                                    <select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true" name="progress" id="progress">
                                        <option value="">Select</option>
                                    </select>
                                </div>
                                <!--end::Access menu-->
                            </div>
                        </div>
                        <!--end::List-->
                        <!--begin::List-->
                        <div class="mh-300px scroll-y me-n7 pe-7">
                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    
                                    <!--begin::Details-->
                                    <div class="ms-5">
                                        <span class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Profile</span>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->
                                <!--begin::Access menu-->
                                <div class="ms-2 w-150px">
                                    <select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true" name="profile" id="profile">
                                        <option value="">Select</option>
                                    </select>
                                </div>
                                <!--end::Access menu-->
                            </div>
                        </div>
                        <!--end::List-->
                        <!--begin::List-->
                        <div class="mh-300px scroll-y me-n7 pe-7">
                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    
                                    <!--begin::Details-->
                                    <div class="ms-5">
                                        <span class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Role</span>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->
                                <!--begin::Access menu-->
                                <div class="ms-2 w-150px">
                                    <select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true" name="role" id="role">
                                        <option value="">Select</option>
                                    </select>
                                </div>
                                <!--end::Access menu-->
                            </div>
                        </div>
                        <!--end::List-->
                        <!--begin::List-->
                        <div class="mh-300px scroll-y me-n7 pe-7">
                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                   
                                    <!--begin::Details-->
                                    <div class="ms-5">
                                        <span class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Status</span>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->
                                <!--begin::Access menu-->
                                <div class="ms-2 w-150px">
                                    <select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true" name="status" id="status">
                                        <option value="">Select</option>
                                    </select>
                                </div>
                                <!--end::Access menu-->
                            </div>
                        </div>
                        <!--end::List-->

                        <!--begin::List-->
                        <div class="mh-300px scroll-y me-n7 pe-7">
                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    
                                    <!--begin::Details-->
                                    <div class="ms-5">
                                        <span class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Refferal</span>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->
                                <!--begin::Access menu-->
                                <div class="ms-2 w-150px">
                                    <select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true" name="refferal" id="refferal">
                                        <option value="">Select</option>
                                        
                                    </select>
                                </div>
                                <!--end::Access menu-->
                            </div>
                        </div>
                        <!--end::List-->
                        <div class="d-flex justify-content-center">
                            <button type="submit"  class="btn  btn-primary mt-5 mb-3">Submit</button>
                        </div>
                    </form>
                </div>
                <!--end::Users-->
                <!--begin::Notice-->
                <!--end::Notice-->
            </div>
            <!--end::Modal body-->
        </div>
            <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!-- end::Modal -->

<!-- begin::Modal -approve-investment- -->
<div class="modal fade" id="modal_approve_smart_finance" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header pb-0 border-0 justify-content-end">
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--begin::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
                <!--begin::Heading-->

                <!--end::Google Contacts Invite-->
                <!--begin::Separator-->
                <!--end::Separator-->
                <!--begin::Textarea-->
                <!--end::Textarea-->
                <!--begin::Users-->
                <div class="mb-10">
                    <!--begin::Heading-->
                    <div class="fs-4 fw-bolder mb-2">Approval of user investment</div>
                    <!--end::Heading-->
                    <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" method="post" action="{{route('approve_smart_finance')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="finance_id" id="finance_id">
                        <!--begin::Input group-->
                        <div class="fv-row mb-8">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                <a href="" download class="col-lg-4 fw-bold fs-6 text-start text-muted text-hover-primary" id="receipt"><span class="fs-6 fw-bold form-label mb-2" >Receipt</span>&nbsp;&nbsp;&nbsp;<i class="fa fa-download"></i></a>
                            </label>
                            <!--end::Label-->
                            <img src="" alt="image" id="bill_bill" width="60%" height="40%" />
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-8">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                <span class="required">Rate of intrest</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Rate of intrest"></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid @error('intrest') is-invalid @enderror" placeholder="Intrest" value="" name="intrest" id="intrest" />
                            <!--end::Input-->
                            <div class="" id="intrest_error"></div>
                            @error('intrest')intrest_error
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-8">
                            <!--begin::Label-->
                            <label class="required fs-6 fw-bold mb-2">Status</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Select..." name="is_status" id="is_status">
                                <option value="">Select</option>
                                <option value="0">Reject</option>
                                <option value="1">Approve</option>
                            </select>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-8">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                <span class="">Investment Date</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Investment Date"></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="date" class="form-control form-control-solid " placeholder="Investment Date" value="" name="investment_date" id="investment_date" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-8">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                <span class="">Accepted Date</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Accepted Date"></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="date" class="form-control form-control-solid " placeholder="Accepted Date" value="" name="accepted_date" id="accepted_date" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        
                        <div class="d-flex justify-content-center">
                            <button type="submit"  class="btn  btn-primary mt-5 mb-3">Submit</button>
                            
                        </div>
                    </form>
                </div>
                <!--end::Users-->
                <!--begin::Notice-->
                <!--end::Notice-->
            </div>
            <!--end::Modal body-->
        </div>
            <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!-- end::Modal -approve-investment- -->

<!-- refferal_modal -->
<div class="modal fade" id="refferal_modal" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header pb-0 border-0 justify-content-end">
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--begin::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
                <!--begin::Heading-->

                <!--end::Google Contacts Invite-->
                <!--begin::Separator-->
                <!--end::Separator-->
                <!--begin::Textarea-->
                <!--end::Textarea-->
                <!--begin::Users-->
                <div class="mb-10">
                    <!--begin::Heading-->
                    <div class="fs-6 fw-bold mb-2">Refferal</div>
                    <!--end::Heading-->
                    <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" method="post" action="{{route('refferal')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="userId" id="userId">
                        
                        
                        <!--begin::List-->
                        <div class="mh-300px scroll-y me-n7 pe-7">
                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    
                                    <!--begin::Details-->
                                    <div class="ms-5">
                                        <span class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">User</span>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->
                                <!--begin::Access menu-->
                                <div class="ms-2 w-150px">
                                    <select class="form-select form-select-solid form-select-sm"  data-hide-search="true" name="user" id="user">
                                        <option value="">Select</option>
                                    </select>
                                </div>
                                <!--end::Access menu-->
                            </div>
                        </div>
                        <!--end::List-->
                        
                        <div class="d-flex justify-content-center">
                            <button type="submit"  class="btn  btn-primary mt-5 mb-3">Submit</button>
                        </div>
                    </form>
                </div>
                <!--end::Users-->
                <!--begin::Notice-->
                <!--end::Notice-->
            </div>
            <!--end::Modal body-->
        </div>
            <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!-- end::refferal_modal -->


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<!-- refferal amount -->
<script type="application/javascript">
    jQuery(document).ready(function ()
    {
        $(document).on('click', 'button[name^="button_reffer"]', function(e) {
            var system_id = $(this).data("system_id");
            console.log(system_id);
            var amount = jQuery("#refferal_amount"+system_id).val();
            console.log(amount);
            if(amount < 1){
                console.log('hai');
                alertText = "Amount should be greater than 1rs";
                var div = document.getElementById("refferal_amount_error");
                div.innerHTML = '';
                div.style.display = "block";
                $( ".refferal_amount_error"+system_id).html('');
                var html ='<div class="text-danger">'+alertText+'</div>';
                $('.refferal_amount_error'+system_id).html(html);

            }
            else{
                $('#refferal_amount_error').hide();
                jQuery.ajax({
                    url : 'refferal_amount',
                    type: 'GET',
                    dataType: 'json',
                    data: { "amount": amount,"user_id" : system_id},
                    success:function(data)
                    {
                        console.log(data);
                        window.location.reload();

                    }
                });
            }
        });
    });
</script>

<!-- image delete -->
<script type="text/javascript">
    function delete_bill() {
        document.getElementById('bill').value = null;
        $("#preview-image-bill").attr("src", '');
        $('#bill_image').hide();
    }
</script>
<!-- image delete end -->

<!-- Reset button -->
<script type="text/javascript">
    $(document).on('click', 'button[name^="reset"]', function(e) {
        document.getElementById('amount').value = null;
        jQuery('select[name="plan"]').empty();
        $('select[name="plan"]').append('<option value="" selected>'+ 'Select' +'</option>');
        $('select[name="plan"]').append('<option value="month">'+ 'Month' +'</option>');
        $('select[name="plan"]').append('<option value="year">'+ 'Year' +'</option>');
        $('#plan_type').hide();
        jQuery('select[name="year"]').empty();
        $('select[name="year"]').append('<option value="" selected>'+ 'Select' +'</option>');
        for(var i=1; i<=10; i++){

            $('select[name="year"]').append('<option value="'+i+'">'+ i +'</option>');
        }
        $('#year').hide();
        document.getElementById('bill').value = null;
        $("#preview-image-bill").attr("src", '');
        $('#example').hide();
        

    });
    
</script>
<!-- Reset button -->


<!-- investment plan type -->
<script type="text/javascript">
    jQuery(document).ready(function ()
    {
        jQuery('select[name="plan"]').on('change',function(){
            var plan = jQuery(this).val();
            jQuery.ajax({
                url : 'plan_type',
                type: 'GET',
                dataType: 'json',
                data: { plan: plan},
                success:function(data)
                {
                    if(plan == 'year'){
                        console.log(data);
                        $('#plan_type').show();
                        jQuery('select[name="plan_id"]').empty();
                        $('select[name="plan_id"]').append('<option value="">'+ "Select" +'</option>');
                        jQuery.each(data, function(key,value){
                            console.log(value)
                            $('select[name="plan_id"]').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                        });
                        $('#year').show();
                    }
                    else{
                        console.log(data);
                        $('#plan_type').hide();
                        $('#year').hide();
                        jQuery('select[name="plan_id"]').empty();
                        $('select[name="plan_id"]').append('<option value="">'+ "Select" +'</option>');
                        jQuery.each(data, function(key,value){
                            console.log(value)
                            $('select[name="plan_id"]').append('<option value="'+ value.id +'" selected>'+ value.name +'</option>');
                        });

                    }
                }
            });
            
        });
    });
</script>

<!-- investment amount validation -->
<!-- <script type="text/javascript">
    jQuery(document).ready(function ()
    {
        jQuery('input[name="amount"]').on('change',function(){
            var amount = jQuery(this).val();
            if(amount)
            {
                if(amount < 100000)
                {
                    alertText = "Minimum amount should be 1,00000";
                    var div = document.getElementById("amount_error");
                    div.innerHTML = '';
                    div.style.display = "block";
                    $( ".amount_error" ).html('');
                    var html ='<div class="text-danger">'+alertText+'</div>';
                    $('.amount_error').html(html);
                } 
                else{
                    $('#amount_error').hide();

                }

            }

        });
    });
</script> -->

<!-- bill image -->
<script type="text/javascript">    
    $(document).ready(function (e) {
       $('#bill').change(function(){ 
            $('#bill_image').show();  
            let reader = new FileReader();
            reader.onload = (e) => { 
                $('#preview-image-bill').attr('src', e.target.result); 
            }
            reader.readAsDataURL(this.files[0]); 
       });
    });
</script>

<!-- example month table -->
<script type="text/javascript">
    jQuery(document).ready(function ()
    {
        jQuery('select[name="plan"]').on('change',function(){
            
            var plan = jQuery(this).val();
            var amount = jQuery("#amount").val();
            $('#example').show();
            //to display today date in heading
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth()+1; //January is 0!
            var yyyy = today.getFullYear();
            if(dd<10) {
                dd = '0'+dd
            } 

            if(mm<10) {
                mm = '0'+mm
            } 
            today = yyyy + '-' + mm + '-' + dd;
            //to display today date in heading end

            //next 30 days
            var date = new Date();
            date.setDate(date.getDate() + 30);
            //console.log(date);
            //next 30 days end
            
            //convert next 30 days with date 6
            var new_date = new Date();
            new_date.setDate(new_date.getDate() + 30);
            new_date.setDate(6);
            //console.log(new_date);
            //convert next 30 days with date 6 end

            if(date > new_date){
                //console.log('yes');

                var date = new Date();
                date.setDate(date.getDate() + 60);
                date.setDate(6);
                //console.log(date);

                //check day
                var day = date.getDay();
                console.log(day);
                if(day == 2 || day ==  0 || day == 5){
                    var date = new Date();
                    date.setDate(date.getDate() + 60);
                    date.setDate(7);
                    //console.log(last);

                    var dd = date.getDate();
                    var mm = date.getMonth()+1; //January is 0!
                    var yyyy = date.getFullYear();
                    if(dd<10) {
                        dd = '0'+dd
                    } 
                    if(mm<10) {
                        mm = '0'+mm
                    } 
                    final = yyyy + '-' + mm + '-' + dd;

                }
                else{
                    var date = new Date();
                    date.setDate(date.getDate() + 60);
                    date.setDate(6);

                    var dd = date.getDate();
                    var mm = date.getMonth()+1; //January is 0!
                    var yyyy = date.getFullYear();
                    if(dd<10) {
                        dd = '0'+dd
                    } 
                    if(mm<10) {
                        mm = '0'+mm
                    } 
                    final = yyyy + '-' + mm + '-' + dd;

                }
                //check day end
            }
            else{

                //console.log('no');
                var date = new Date();
                date.setDate(date.getDate() + 30);
                date.setDate(6);
                //console.log(dateee);

                var day = date.getDay();
                console.log(day);
                if(day == 2 || day ==  0 || day == 5){
                    var date = new Date();
                    date.setDate(date.getDate() + 30);
                    date.setDate(7);
                    //console.log(date);
                    var dd = date.getDate();
                    var mm = date.getMonth()+1; //January is 0!
                    var yyyy = date.getFullYear();
                    if(dd<10) {
                        dd = '0'+dd
                    } 
                    if(mm<10) {
                        mm = '0'+mm
                    } 
                    final = yyyy + '-' + mm + '-' + dd;
                }
                else{
                    var date = new Date();
                    date.setDate(date.getDate() + 30);
                    date.setDate(6);
                    var dd = date.getDate();
                    var mm = date.getMonth()+1; //January is 0!
                    var yyyy = date.getFullYear();
                    if(dd<10) {
                        dd = '0'+dd
                    } 
                    if(mm<10) {
                        mm = '0'+mm
                    } 
                    final = yyyy + '-' + mm + '-' + dd;

                }
            }

            if(plan == 'month'){
                if(amount < 100000)
                {
                    alertText = "Minimum amount should be 1,00000";
                    var div = document.getElementById("amount_error");
                    div.innerHTML = '';
                    div.style.display = "block";
                    $( ".amount_error" ).html('');
                    var html ='<div class="text-danger">'+alertText+'</div>';
                    $('.amount_error').html(html);
                } 
                else{
                    $('#amount_error').hide();

                }

                $( ".example" ).html('');
                var html ='<div class="d-flex justify-content-center">Monthly Returns(If you start investment in '+today+')</div><table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4"><thead><tr class="fw-bolder text-muted"><th class="">Month</th><th class="">Investment Amount</th><th class="">Percentage(Sample)</th><th class="">Monthly return</th><th class="">Payment date</th></tr></thead><tbody class = "sample"></tbody></table>';
                $('.example').html(html);
                var output = '';
                for(var count = 1; count <= 3; count++)
                {
                    
                    output += '<tr>';
                    output += '<td>'+count+'</td>';
                    output += '<td>'+amount+'</td>';
                    output += '<td>3%</td>';
                    output += '<td>'+3/100*amount+'</td>';
                    output += '<td>'+final+'</td>';
                    output += '</tr>';


                    
                    date.setDate(date.getDate() + 30);
                    date.setDate(6);
                    //console.log(dateee);

                    var day = date.getDay();
                    //console.log(day);
                    if(day == 2 || day ==  0 || day == 5){

                        date.setDate(7);
                        //console.log(date);
                        var dd = date.getDate();
                        var mm = date.getMonth()+1; //January is 0!
                        var yyyy = date.getFullYear();
                        if(dd<10) {
                            dd = '0'+dd
                        } 
                        if(mm<10) {
                            mm = '0'+mm
                        } 
                        final = yyyy + '-' + mm + '-' + dd;
                    }
                    else{
                        date.setDate(6);
                        var dd = date.getDate();
                        var mm = date.getMonth()+1; //January is 0!
                        var yyyy = date.getFullYear();
                        if(dd<10) {
                            dd = '0'+dd
                        } 
                        if(mm<10) {
                            mm = '0'+mm
                        } 
                        final = yyyy + '-' + mm + '-' + dd;

                    }
                    
                }
                $('.sample').html(output);

            }
            else{
                $( ".example" ).html('');
                var html ='';
                $('.example').html(html);


            }
        });
    });
</script>
<!-- end example month table -->

<!-- example year table -->
<script type="text/javascript">
    jQuery(document).ready(function ()
    {
        jQuery('select[name="plan_id"]').on('change',function(){
            var plan_id = jQuery(this).val();
            if(plan_id == '2'){
                var amount = jQuery("#amount").val();
                $('#example').show();
                //to display today date in heading
                var today = new Date();
                var dd = today.getDate();
                var mm = today.getMonth()+1; //January is 0!
                var yyyy = today.getFullYear();
                if(dd<10) {
                    dd = '0'+dd
                } 

                if(mm<10) {
                    mm = '0'+mm
                } 
                today = yyyy + '-' + mm + '-' + dd;
                //to display today date in heading end


                //year 2

                //next 1 year
                var date = new Date();
                date.setFullYear(date.getFullYear() + 1);

                var new_date = new Date();
                new_date.setFullYear(new_date.getFullYear() + 1);
                //date.setDate(date.getDate() + 360);
                //next 1 year end
                
                var amnt = amount; 
                //amount-loop
                for (var i = 1; i <= 2; i++){

                    for (var j = 1; j <= 12; j++){
                        //amount
                        var profit = 3/100 * amnt;
                        amnt = parseFloat(profit) + parseFloat(amnt);
                        //console.log(amnt);
                    }
                }
                //console.log(Math.round(amnt));
                //amount-loop-end

                //payment-loop
                for (var k = 2; k <= 2; k++){
                    date.setFullYear(date.getFullYear() + 1);
                    new_date.setFullYear(new_date.getFullYear() + 1);
                    //date.setDate(date.getDate() + 360);
                    
                }
                date.setMonth(date.getMonth() + 1);
                //date.setDate(date.getDate() + 300);
                date.setDate(6);
                new_date.setMonth(new_date.getMonth() + 1);
                if(new_date > date){
                    date.setMonth(date.getMonth() + 1);
                    var day = date.getDay();
                    //console.log(day);
                    if(day == 2 || day ==  0 || day == 5){

                        date.setDate(7);
                        //console.log(date);
                        var dd = date.getDate();
                        var mm = date.getMonth()+1; //January is 0!
                        var yyyy = date.getFullYear();
                        if(dd<10) {
                            dd = '0'+dd
                        } 
                        if(mm<10) {
                            mm = '0'+mm
                        } 
                        final = yyyy + '-' + mm + '-' + dd;
                    }
                    else{
                        date.setDate(6);
                        var dd = date.getDate();
                        var mm = date.getMonth()+1; //January is 0!
                        var yyyy = date.getFullYear();
                        if(dd<10) {
                            dd = '0'+dd
                        } 
                        if(mm<10) {
                            mm = '0'+mm
                        } 
                        final = yyyy + '-' + mm + '-' + dd;
                    }
                }
                else{
                    var day = date.getDay();
                    //console.log(day);
                    if(day == 2 || day ==  0 || day == 5){

                        date.setDate(7);
                        //console.log(date);
                        var dd = date.getDate();
                        var mm = date.getMonth()+1; //January is 0!
                        var yyyy = date.getFullYear();
                        if(dd<10) {
                            dd = '0'+dd
                        } 
                        if(mm<10) {
                            mm = '0'+mm
                        } 
                        final = yyyy + '-' + mm + '-' + dd;
                    }
                    else{
                        date.setDate(6);
                        var dd = date.getDate();
                        var mm = date.getMonth()+1; //January is 0!
                        var yyyy = date.getFullYear();
                        if(dd<10) {
                            dd = '0'+dd
                        } 
                        if(mm<10) {
                            mm = '0'+mm
                        } 
                        final = yyyy + '-' + mm + '-' + dd;
                    }

                }

                //year 2 end

                //year 3

                //next 1 year
                var date1 = new Date();
                date1.setFullYear(date1.getFullYear() + 1);

                var new_date1 = new Date();
                new_date1.setFullYear(new_date1.getFullYear() + 1);
                //date.setDate(date.getDate() + 360);
                //next 1 year end
                
                var amnt1 = amount; 
                //amount-loop
                for (var l = 1; l <= 3; l++){

                    for (var m = 1; m <= 12; m++){
                        //amount
                        var profit1 = 3/100 * amnt1;
                        amnt1 = parseFloat(profit1) + parseFloat(amnt1);
                    }
                }
                //console.log(amnt1);
                //amount-loop-end

                //payment-loop
                for (var n = 2; n <= 3; n++){
                    date1.setFullYear(date1.getFullYear() + 1);
                    new_date1.setFullYear(new_date1.getFullYear() + 1);
                    //date.setDate(date.getDate() + 360);
                    
                }
                date1.setMonth(date1.getMonth() + 1);
                //date.setDate(date.getDate() + 300);
                date1.setDate(6);
                new_date1.setMonth(new_date1.getMonth() + 1);
                if(new_date1 > date1){
                    date1.setMonth(date1.getMonth() + 1);
                    var day = date1.getDay();
                    //console.log(day);
                    if(day == 2 || day ==  0 || day == 5){

                        date1.setDate(7);
                        //console.log(date);
                        var dd = date1.getDate();
                        var mm = date1.getMonth()+1; //January is 0!
                        var yyyy = date1.getFullYear();
                        if(dd<10) {
                            dd = '0'+dd
                        } 
                        if(mm<10) {
                            mm = '0'+mm
                        } 
                        final1 = yyyy + '-' + mm + '-' + dd;
                    }
                    else{
                        date1.setDate(6);
                        var dd = date1.getDate();
                        var mm = date1.getMonth()+1; //January is 0!
                        var yyyy = date1.getFullYear();
                        if(dd<10) {
                            dd = '0'+dd
                        } 
                        if(mm<10) {
                            mm = '0'+mm
                        } 
                        final1 = yyyy + '-' + mm + '-' + dd;
                    }
                }
                else{
                    var day = date1.getDay();
                    //console.log(day);
                    if(day == 2 || day ==  0 || day == 5){

                        date1.setDate(7);
                        //console.log(date);
                        var dd = date1.getDate();
                        var mm = date1.getMonth()+1; //January is 0!
                        var yyyy = date1.getFullYear();
                        if(dd<10) {
                            dd = '0'+dd
                        } 
                        if(mm<10) {
                            mm = '0'+mm
                        } 
                        final1 = yyyy + '-' + mm + '-' + dd;
                    }
                    else{
                        date1.setDate(6);
                        var dd = date1.getDate();
                        var mm = date1.getMonth()+1; //January is 0!
                        var yyyy = date1.getFullYear();
                        if(dd<10) {
                            dd = '0'+dd
                        } 
                        if(mm<10) {
                            mm = '0'+mm
                        } 
                        final1 = yyyy + '-' + mm + '-' + dd;
                    }

                }

                //year 3 end

                //year 4

                //next 1 year
                var date2 = new Date();
                date2.setFullYear(date2.getFullYear() + 1);

                var new_date2 = new Date();
                new_date2.setFullYear(new_date2.getFullYear() + 1);
                //date.setDate(date.getDate() + 360);
                //next 1 year end
                
                var amnt2 = amount; 
                //amount-loop
                for (var o = 1; o <= 4; o++){

                    for (var p = 1; p <= 12; p++){
                        //amount
                        var profit2 = 3/100 * amnt2;
                        amnt2 = parseFloat(profit2) + parseFloat(amnt2);
                    }
                }
                //console.log(amnt1);
                //amount-loop-end

                //payment-loop
                for (var q = 2; q <= 4; q++){
                    date2.setFullYear(date2.getFullYear() + 1);
                    new_date2.setFullYear(new_date2.getFullYear() + 1);
                    //date.setDate(date.getDate() + 360);
                    
                }
                date2.setMonth(date2.getMonth() + 1);
                //date.setDate(date.getDate() + 300);
                date2.setDate(6);
                new_date2.setMonth(new_date2.getMonth() + 1);
                if(new_date2 > date2){
                    date2.setMonth(date2.getMonth() + 1);
                    var day = date2.getDay();
                    //console.log(day);
                    if(day == 2 || day ==  0 || day == 5){

                        date2.setDate(7);
                        //console.log(date);
                        var dd = date2.getDate();
                        var mm = date2.getMonth()+1; //January is 0!
                        var yyyy = date2.getFullYear();
                        if(dd<10) {
                            dd = '0'+dd
                        } 
                        if(mm<10) {
                            mm = '0'+mm
                        } 
                        final2 = yyyy + '-' + mm + '-' + dd;
                    }
                    else{
                        date2.setDate(6);
                        var dd = date2.getDate();
                        var mm = date2.getMonth()+1; //January is 0!
                        var yyyy = date2.getFullYear();
                        if(dd<10) {
                            dd = '0'+dd
                        } 
                        if(mm<10) {
                            mm = '0'+mm
                        } 
                        final2 = yyyy + '-' + mm + '-' + dd;
                    }
                }
                else{
                    var day = date2.getDay();
                    //console.log(day);
                    if(day == 2 || day ==  0 || day == 5){

                        date2.setDate(7);
                        //console.log(date);
                        var dd = date2.getDate();
                        var mm = date2.getMonth()+1; //January is 0!
                        var yyyy = date2.getFullYear();
                        if(dd<10) {
                            dd = '0'+dd
                        } 
                        if(mm<10) {
                            mm = '0'+mm
                        } 
                        final2 = yyyy + '-' + mm + '-' + dd;
                    }
                    else{
                        date2.setDate(6);
                        var dd = date2.getDate();
                        var mm = date2.getMonth()+1; //January is 0!
                        var yyyy = date2.getFullYear();
                        if(dd<10) {
                            dd = '0'+dd
                        } 
                        if(mm<10) {
                            mm = '0'+mm
                        } 
                        final2 = yyyy + '-' + mm + '-' + dd;
                    }

                }

                //year 4 end
                $( ".example" ).html('');
                var html ='<div class="d-flex justify-content-center">Yearly- Long Term (S)(If you start investment in '+today+')</div><table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4"><thead><tr class="fw-bolder text-muted"><th class="">Year</th><th class="">Investment Amount</th><th class="">Percentage(Sample)</th><th class="">Yearly Return</th><th class="">Payment date</th></tr></thead><tbody><tr><td>2</td><td>'+amount+'</td><td>3%</td><td>'+Math.round(amnt)+'</td><td>'+final+'</td></tr><tr><td>3</td><td>'+amount+'</td><td>3%</td><td>'+Math.round(amnt1)+'</td><td>'+final1+'</td></tr><tr><td>4</td><td>'+amount+'</td><td>3%</td><td>'+Math.round(amnt2)+'</td><td>'+final2+'</td></tr></tbody></table>';
                $('.example').html(html);

            }
            else{
                var amount = jQuery("#amount").val();
                if(amount < 50000)
                {
                    alertText = "Minimum amount should be 50,000";
                    var div = document.getElementById("amount_error");
                    div.innerHTML = '';
                    div.style.display = "block";
                    $( ".amount_error" ).html('');
                    var html ='<div class="text-danger">'+alertText+'</div>';
                    $('.amount_error').html(html);
                } 
                else{
                    $('#amount_error').hide();

                }
                $('#example').show();
                //to display today date in heading
                var today = new Date();
                var dd = today.getDate();
                var mm = today.getMonth()+1; //January is 0!
                var yyyy = today.getFullYear();
                if(dd<10) {
                    dd = '0'+dd
                } 

                if(mm<10) {
                    mm = '0'+mm
                } 
                today = yyyy + '-' + mm + '-' + dd;
                //to display today date in heading end


                //year 2

                //next 1 year
                var date = new Date();
                date.setFullYear(date.getFullYear() + 1);

                var new_date = new Date();
                new_date.setFullYear(new_date.getFullYear() + 1);
                //date.setDate(date.getDate() + 360);
                //next 1 year end
                
                //payment-loop
                for (var k = 2; k <= 2; k++){
                    date.setFullYear(date.getFullYear() + 1);
                    new_date.setFullYear(new_date.getFullYear() + 1);
                    //date.setDate(date.getDate() + 360);
                    
                }
                date.setMonth(date.getMonth() + 1);
                //date.setDate(date.getDate() + 300);
                date.setDate(6);
                new_date.setMonth(new_date.getMonth() + 1);
                if(new_date > date){
                    date.setMonth(date.getMonth() + 1);
                    var day = date.getDay();
                    //console.log(day);
                    if(day == 2 || day ==  0 || day == 5){

                        date.setDate(7);
                        //console.log(date);
                        var dd = date.getDate();
                        var mm = date.getMonth()+1; //January is 0!
                        var yyyy = date.getFullYear();
                        if(dd<10) {
                            dd = '0'+dd
                        } 
                        if(mm<10) {
                            mm = '0'+mm
                        } 
                        final = yyyy + '-' + mm + '-' + dd;
                    }
                    else{
                        date.setDate(6);
                        var dd = date.getDate();
                        var mm = date.getMonth()+1; //January is 0!
                        var yyyy = date.getFullYear();
                        if(dd<10) {
                            dd = '0'+dd
                        } 
                        if(mm<10) {
                            mm = '0'+mm
                        } 
                        final = yyyy + '-' + mm + '-' + dd;
                    }
                }
                else{
                    var day = date.getDay();
                    //console.log(day);
                    if(day == 2 || day ==  0 || day == 5){

                        date.setDate(7);
                        //console.log(date);
                        var dd = date.getDate();
                        var mm = date.getMonth()+1; //January is 0!
                        var yyyy = date.getFullYear();
                        if(dd<10) {
                            dd = '0'+dd
                        } 
                        if(mm<10) {
                            mm = '0'+mm
                        } 
                        final = yyyy + '-' + mm + '-' + dd;
                    }
                    else{
                        date.setDate(6);
                        var dd = date.getDate();
                        var mm = date.getMonth()+1; //January is 0!
                        var yyyy = date.getFullYear();
                        if(dd<10) {
                            dd = '0'+dd
                        } 
                        if(mm<10) {
                            mm = '0'+mm
                        } 
                        final = yyyy + '-' + mm + '-' + dd;
                    }

                }

                //year 2 end

                //year 3

                //next 1 year
                var date1 = new Date();
                date1.setFullYear(date1.getFullYear() + 1);

                var new_date1 = new Date();
                new_date1.setFullYear(new_date1.getFullYear() + 1);
                //date.setDate(date.getDate() + 360);
                //next 1 year end
                
                var amnt1 = amount; 
                

                //payment-loop
                for (var n = 2; n <= 3; n++){
                    date1.setFullYear(date1.getFullYear() + 1);
                    new_date1.setFullYear(new_date1.getFullYear() + 1);
                    //date.setDate(date.getDate() + 360);
                    
                }
                date1.setMonth(date1.getMonth() + 1);
                //date.setDate(date.getDate() + 300);
                date1.setDate(6);
                new_date1.setMonth(new_date1.getMonth() + 1);
                if(new_date1 > date1){
                    date1.setMonth(date1.getMonth() + 1);
                    var day = date1.getDay();
                    //console.log(day);
                    if(day == 2 || day ==  0 || day == 5){

                        date1.setDate(7);
                        //console.log(date);
                        var dd = date1.getDate();
                        var mm = date1.getMonth()+1; //January is 0!
                        var yyyy = date1.getFullYear();
                        if(dd<10) {
                            dd = '0'+dd
                        } 
                        if(mm<10) {
                            mm = '0'+mm
                        } 
                        final1 = yyyy + '-' + mm + '-' + dd;
                    }
                    else{
                        date1.setDate(6);
                        var dd = date1.getDate();
                        var mm = date1.getMonth()+1; //January is 0!
                        var yyyy = date1.getFullYear();
                        if(dd<10) {
                            dd = '0'+dd
                        } 
                        if(mm<10) {
                            mm = '0'+mm
                        } 
                        final1 = yyyy + '-' + mm + '-' + dd;
                    }
                }
                else{
                    var day = date1.getDay();
                    //console.log(day);
                    if(day == 2 || day ==  0 || day == 5){

                        date1.setDate(7);
                        //console.log(date);
                        var dd = date1.getDate();
                        var mm = date1.getMonth()+1; //January is 0!
                        var yyyy = date1.getFullYear();
                        if(dd<10) {
                            dd = '0'+dd
                        } 
                        if(mm<10) {
                            mm = '0'+mm
                        } 
                        final1 = yyyy + '-' + mm + '-' + dd;
                    }
                    else{
                        date1.setDate(6);
                        var dd = date1.getDate();
                        var mm = date1.getMonth()+1; //January is 0!
                        var yyyy = date1.getFullYear();
                        if(dd<10) {
                            dd = '0'+dd
                        } 
                        if(mm<10) {
                            mm = '0'+mm
                        } 
                        final1 = yyyy + '-' + mm + '-' + dd;
                    }

                }

                //year 3 end

                //year 4

                //next 1 year
                var date2 = new Date();
                date2.setFullYear(date2.getFullYear() + 1);

                var new_date2 = new Date();
                new_date2.setFullYear(new_date2.getFullYear() + 1);
                //date.setDate(date.getDate() + 360);
                //next 1 year end
                

                //payment-loop
                for (var q = 2; q <= 4; q++){
                    date2.setFullYear(date2.getFullYear() + 1);
                    new_date2.setFullYear(new_date2.getFullYear() + 1);
                    //date.setDate(date.getDate() + 360);
                    
                }
                date2.setMonth(date2.getMonth() + 1);
                //date.setDate(date.getDate() + 300);
                date2.setDate(6);
                new_date2.setMonth(new_date2.getMonth() + 1);
                if(new_date2 > date2){
                    date2.setMonth(date2.getMonth() + 1);
                    var day = date2.getDay();
                    //console.log(day);
                    if(day == 2 || day ==  0 || day == 5){

                        date2.setDate(7);
                        //console.log(date);
                        var dd = date2.getDate();
                        var mm = date2.getMonth()+1; //January is 0!
                        var yyyy = date2.getFullYear();
                        if(dd<10) {
                            dd = '0'+dd
                        } 
                        if(mm<10) {
                            mm = '0'+mm
                        } 
                        final2 = yyyy + '-' + mm + '-' + dd;
                    }
                    else{
                        date2.setDate(6);
                        var dd = date2.getDate();
                        var mm = date2.getMonth()+1; //January is 0!
                        var yyyy = date2.getFullYear();
                        if(dd<10) {
                            dd = '0'+dd
                        } 
                        if(mm<10) {
                            mm = '0'+mm
                        } 
                        final2 = yyyy + '-' + mm + '-' + dd;
                    }
                }
                else{
                    var day = date2.getDay();
                    //console.log(day);
                    if(day == 2 || day ==  0 || day == 5){

                        date2.setDate(7);
                        //console.log(date);
                        var dd = date2.getDate();
                        var mm = date2.getMonth()+1; //January is 0!
                        var yyyy = date2.getFullYear();
                        if(dd<10) {
                            dd = '0'+dd
                        } 
                        if(mm<10) {
                            mm = '0'+mm
                        } 
                        final2 = yyyy + '-' + mm + '-' + dd;
                    }
                    else{
                        date2.setDate(6);
                        var dd = date2.getDate();
                        var mm = date2.getMonth()+1; //January is 0!
                        var yyyy = date2.getFullYear();
                        if(dd<10) {
                            dd = '0'+dd
                        } 
                        if(mm<10) {
                            mm = '0'+mm
                        } 
                        final2 = yyyy + '-' + mm + '-' + dd;
                    }

                }

                //year 4 end


                $( ".example" ).html('');
                var html ='<div class="d-flex justify-content-center">Yearly- Long Term (M)(If you start investment in '+today+')</div><table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4"><thead><tr class="fw-bolder text-muted"><th class="">Year</th><th class="">Monthly Investment</th><th class="">Percentage(Sample)</th><th class="">Yearly Return</th><th class="">Payment date</th></tr></thead><tbody><tr><td>2</td><td>24,00,000</td><td>3%</td><td>1,357,000</td><td>'+final+'</td></tr><tr><td>3</td><td>36,00,000</td><td>3%</td><td>3,390,000</td><td>'+final1+'</td></tr><tr><td>4</td><td>48,00,000</td><td>3%</td><td>61,87,500</td><td>'+final2+'</td></tr></tbody></table>';
                $('.example').html(html);

            }
        });
    });
</script>
<!-- end example year table -->

<!-- search -->
<!-- <script type="application/javascript">
    jQuery(document).ready(function ()
    {
        jQuery('input[name="search"]').on('change',function(){
            var search = jQuery(this).val();
            var status = jQuery("#status_search").val();
            var progress = jQuery("#progress_search").val();
            var profile_search = jQuery("#profile_search").val();
            var role_search = jQuery("#role_search").val();
            console.log(search);
            console.log(status);
            console.log(progress);
            console.log(profile_search);
            console.log(role_search);
            jQuery.ajax({
                url : 'user_search',
                type: 'GET',
                dataType: 'json',
                data: { "search": search,"status" : status,"progress" : progress,"profile" : profile_search,"role" : role_search},
                success:function(data)
                {
                    console.log(data);
                    var output = '';
                    if(data.length > 0){
                        for(var count = 0; count < data.length; count++)
                        {
                            var directory = 'user/'+data[count].id+'/';
                            var image_url = 'storage/app/public/avatar/'+data[count].avatar+'/';
                            output += '<tr>';
                            if(data[count].avatar){
                                output += '<td><div class="d-flex align-items-center"><div class="symbol symbol-45px me-5"><img src="'+image_url+'" alt="" /></div><div class="d-flex justify-content-start flex-column"><a href="'+directory+'" class="text-dark fw-bolder text-hover-primary fs-6">'+data[count].first_name+' '+data[count].last_name+'</a><span class="text-muted fw-bold text-muted d-block fs-7">'+data[count].id+'</span></td>';

                            }
                            else{

                                output += '<td><div class="d-flex align-items-center"><div class="symbol symbol-45px me-5"><img src="{{ asset('public/assets/media/avatars/blank.png') }}" alt="" /></div><div class="d-flex justify-content-start flex-column"><a href="'+directory+'" class="text-dark fw-bolder text-hover-primary fs-6">'+data[count].first_name+' '+data[count].last_name+'</a><span class="text-muted fw-bold text-muted d-block fs-7">'+data[count].id+'</span></td>';

                            }

                            output += '<td>'+data[count].name+'</td>';
                            if(data[count].is_finanace == 0){
                                output += '<td>No</td>';
                            }
                            else{
                                output += '<td>Yes</td>';
                            }
                            if(data[count].is_tax == 0){
                                output += '<td>No</td>';
                            }
                            else{
                                output += '<td>Yes</td>';
                            }
                            if(data[count].is_profile_verified == 0 || data[count].is_profile_updated == 1){

                                output += '<td><span class="badge py-3 px-4 fs-7 badge-light-warning">Pending</span></td>';
                            }
                            else{
                                output += '<td><span class="badge py-3 px-4 fs-7 badge-light-success">Verified</span></td>';
                            }
                            if(data[count].is_active == 0){

                                output += '<td><span class="badge py-3 px-4 fs-7 badge-light-warning">Pending</span></td>';
                            }
                            else{
                                output += '<td><span class="badge py-3 px-4 fs-7 badge-light-success">Approved</span></td>';
                            }
                            if(data[count].is_lock == 0){

                                output += '<td><span class="badge py-3 px-4 fs-7 badge-light-success">Active</span></td>';
                            }
                            else{
                                output += '<td><span class="badge py-3 px-4 fs-7 badge-light-danger">Locked</span></td>';
                            }
                            if(data[count].role_id == 1){

                                output += '<td><div class=" flex-shrink-0"><button type="button"  class="btn  btn-light mb-5" onclick="super_admin()"><i class="fas fa-pencil-alt" id="fa"></i></button></div></td>';
                            }
                            else{
                                output += '<td><div class=" flex-shrink-0"><button type="button" id="kt_sign_in_submit" class="btn  btn-light mb-5" data-system_id="'+data[count].id+'" name="edit"><i class="fas fa-pencil-alt" id="fa"></i></button></div></td>';
                            }
                            output += '</tr>';
                        }
                    }
                    else
                    {
                        output += '<tr>';
                        output += '<td colspan="6">No Data Found</td>';
                        output += '</tr>';
                    }
                    $('tbody').html(output);
                }
            });  
        });
    });
</script> -->

<!-- search -->
<script type="application/javascript">
    jQuery(document).ready(function ()
    {
        jQuery('input[name="search"]').on('change',function(){
            var search = jQuery(this).val();
            jQuery.ajax({
                url : 'user_search',
                type: 'GET',
                dataType: 'json',
                data: { "search": search},
                success:function(data)
                {
                    console.log(data);
                    var output = '';
                    if(data.length > 0){
                        for(var count = 0; count < data.length; count++)
                        {
                            var directory = 'user/'+data[count].id+'/';
                            var image_url = data[count].avatar;
                            output += '<tr>';
                            if(data[count].avatar){
                                output += '<td><div class="d-flex align-items-center"><div class="symbol symbol-45px me-5"><img src="'+image_url+'" alt="" /></div><div class="d-flex justify-content-start flex-column"><a href="'+directory+'" class="text-dark fw-bolder text-hover-primary fs-6">'+data[count].first_name+' '+data[count].last_name+'</a><span class="text-muted fw-bold text-muted d-block fs-7">'+data[count].id+'</span></td>';

                            }
                            else{

                                output += '<td><div class="d-flex align-items-center"><div class="symbol symbol-45px me-5"><img src="{{ asset('public/assets/media/avatars/blank.png') }}" alt="" /></div><div class="d-flex justify-content-start flex-column"><a href="'+directory+'" class="text-dark fw-bolder text-hover-primary fs-6">'+data[count].first_name+' '+data[count].last_name+'</a><span class="text-muted fw-bold text-muted d-block fs-7">'+data[count].id+'</span></td>';

                            }

                            output += '<td>'+data[count].name+'</td>';
                            
                            if(data[count].is_profile_verified == 2){
                                output += '<td><span class="badge py-3 px-4 fs-7 badge-light-danger">Incomplete</span></td>';

                            }
                            else if(data[count].is_profile_verified == 0 || data[count].is_profile_updated == 1){

                                output += '<td><span class="badge py-3 px-4 fs-7 badge-light-warning">Pending</span></td>';
                            }
                            else{
                                output += '<td><span class="badge py-3 px-4 fs-7 badge-light-success">Verified</span></td>';
                            }
                            if(data[count].is_active == 0){

                                output += '<td><span class="badge py-3 px-4 fs-7 badge-light-warning">Pending</span></td>';
                            }
                            else{
                                output += '<td><span class="badge py-3 px-4 fs-7 badge-light-success">Approved</span></td>';
                            }
                            if(data[count].is_lock == 0){

                                output += '<td><span class="badge py-3 px-4 fs-7 badge-light-success">Active</span></td>';
                            }
                            else{
                                output += '<td><span class="badge py-3 px-4 fs-7 badge-light-danger">Locked</span></td>';
                            }
                            if(data[count].role_id == 1){

                                output += '<td><div class=" flex-shrink-0"><button type="button"  class="btn  btn-light mb-5" onclick="super_admin()"><i class="fas fa-pencil-alt" id="fa"></i></button></div></td>';
                            }
                            else{
                                output += '<td><div class=" flex-shrink-0"><button type="button" id="kt_sign_in_submit" class="btn  btn-light mb-5" data-system_id="'+data[count].id+'" name="edit"><i class="fas fa-pencil-alt" id="fa"></i></button></div></td>';
                            }
                            output += '</tr>';
                        }
                    }
                    else
                    {
                        output += '<tr>';
                        output += '<td colspan="6">No Data Found</td>';
                        output += '</tr>';
                    }
                    $('.user_table').html(output);
                }
            });  
        });
    });
</script>

<!-- status -->
<script type="application/javascript">
    jQuery(document).ready(function ()
    {
        jQuery('select[name="status_search"]').on('change',function(){
            var status = jQuery(this).val();
            var search = jQuery("#search").val();
            jQuery.ajax({
                url : 'user_status',
                type: 'GET',
                dataType: 'json',
                data: { "search": search,"status" : status},
                success:function(data)
                {
                    console.log(data);
                    var output = '';
                    if(data.length > 0){
                        for(var count = 0; count < data.length; count++)
                        {
                            var directory = 'user/'+data[count].id+'/';
                            var image_url = 'storage/app/public/avatar/'+data[count].avatar+'/';
                            output += '<tr>';
                            if(data[count].avatar){
                                output += '<td><div class="d-flex align-items-center"><div class="symbol symbol-45px me-5"><img src="'+image_url+'" alt="" /></div><div class="d-flex justify-content-start flex-column"><a href="'+directory+'" class="text-dark fw-bolder text-hover-primary fs-6">'+data[count].first_name+' '+data[count].last_name+'</a><span class="text-muted fw-bold text-muted d-block fs-7">'+data[count].id+'</span></td>';

                            }
                            else{

                                output += '<td><div class="d-flex align-items-center"><div class="symbol symbol-45px me-5"><img src="{{ asset('public/assets/media/avatars/blank.png') }}" alt="" /></div><div class="d-flex justify-content-start flex-column"><a href="'+directory+'" class="text-dark fw-bolder text-hover-primary fs-6">'+data[count].first_name+' '+data[count].last_name+'</a><span class="text-muted fw-bold text-muted d-block fs-7">'+data[count].id+'</span></td>';

                            }

                            output += '<td>'+data[count].name+'</td>';
                            if(data[count].is_finanace == 0){
                                output += '<td>No</td>';
                            }
                            else{
                                output += '<td>Yes</td>';
                            }
                            if(data[count].is_tax == 0){
                                output += '<td>No</td>';
                            }
                            else{
                                output += '<td>Yes</td>';
                            }
                            if(data[count].is_profile_verified == 2){
                                output += '<td><span class="badge py-3 px-4 fs-7 badge-light-danger">Incomplete</span></td>';

                            }
                            else if(data[count].is_profile_verified == 0 || data[count].is_profile_updated == 1){

                                output += '<td><span class="badge py-3 px-4 fs-7 badge-light-warning">Pending</span></td>';
                            }
                            else{
                                output += '<td><span class="badge py-3 px-4 fs-7 badge-light-success">Verified</span></td>';
                            }
                            if(data[count].is_active == 0){

                                output += '<td><span class="badge py-3 px-4 fs-7 badge-light-warning">Pending</span></td>';
                            }
                            else{
                                output += '<td><span class="badge py-3 px-4 fs-7 badge-light-success">Approved</span></td>';
                            }
                            if(data[count].is_lock == 0){

                                output += '<td><span class="badge py-3 px-4 fs-7 badge-light-success">Active</span></td>';
                            }
                            else{
                                output += '<td><span class="badge py-3 px-4 fs-7 badge-light-danger">Locked</span></td>';
                            }
                            if(data[count].role_id == 1){

                                output += '<td><div class=" flex-shrink-0"><button type="button"  class="btn  btn-light mb-5" onclick="super_admin()"><i class="fas fa-pencil-alt" id="fa"></i></button></div></td>';
                            }
                            else{
                                output += '<td><div class=" flex-shrink-0"><button type="button" id="kt_sign_in_submit" class="btn  btn-light mb-5" data-system_id="'+data[count].id+'" name="edit"><i class="fas fa-pencil-alt" id="fa"></i></button></div></td>';
                            }
                            output += '</tr>';
                        }
                    }
                    else
                    {
                        output += '<tr>';
                        output += '<td class= "fw-bold" colspan="6">No Data Found</td>';
                        output += '</tr>';
                    }
                    $('tbody').html(output);
                }
            });  
        });
    });
</script>

<!-- progress -->
<script type="application/javascript">
    jQuery(document).ready(function ()
    {
        jQuery('select[name="progress_search"]').on('change',function(){ 
            var progress = jQuery(this).val();
            var search = jQuery("#search").val();
            console.log(progress);
            console.log(search);
            jQuery.ajax({
                url : 'user_progress',
                type: 'GET',
                dataType: 'json',
                data: { "search": search,"progress" : progress},
                success:function(data)
                {
                    console.log(data);
                    var output = '';
                    if(data.length > 0){
                        for(var count = 0; count < data.length; count++)
                        {
                            var directory = 'user/'+data[count].id+'/';
                            var image_url = 'storage/app/public/avatar/'+data[count].avatar+'/';
                            output += '<tr>';
                            if(data[count].avatar){
                                output += '<td><div class="d-flex align-items-center"><div class="symbol symbol-45px me-5"><img src="'+image_url+'" alt="" /></div><div class="d-flex justify-content-start flex-column"><a href="'+directory+'" class="text-dark fw-bolder text-hover-primary fs-6">'+data[count].first_name+' '+data[count].last_name+'</a><span class="text-muted fw-bold text-muted d-block fs-7">'+data[count].id+'</span></td>';

                            }
                            else{

                                output += '<td><div class="d-flex align-items-center"><div class="symbol symbol-45px me-5"><img src="{{ asset('public/assets/media/avatars/blank.png') }}" alt="" /></div><div class="d-flex justify-content-start flex-column"><a href="'+directory+'" class="text-dark fw-bolder text-hover-primary fs-6">'+data[count].first_name+' '+data[count].last_name+'</a><span class="text-muted fw-bold text-muted d-block fs-7">'+data[count].id+'</span></td>';

                            }

                            output += '<td>'+data[count].name+'</td>';
                            if(data[count].is_finanace == 0){
                                output += '<td>No</td>';
                            }
                            else{
                                output += '<td>Yes</td>';
                            }
                            if(data[count].is_tax == 0){
                                output += '<td>No</td>';
                            }
                            else{
                                output += '<td>Yes</td>';
                            }
                            if(data[count].is_profile_verified == 2){
                                output += '<td><span class="badge py-3 px-4 fs-7 badge-light-danger">Incomplete</span></td>';

                            }
                            else if(data[count].is_profile_verified == 0 || data[count].is_profile_updated == 1){

                                output += '<td><span class="badge py-3 px-4 fs-7 badge-light-warning">Pending</span></td>';
                            }
                            else{
                                output += '<td><span class="badge py-3 px-4 fs-7 badge-light-success">Verified</span></td>';
                            }
                            if(data[count].is_active == 0){

                                output += '<td><span class="badge py-3 px-4 fs-7 badge-light-warning">Pending</span></td>';
                            }
                            else{
                                output += '<td><span class="badge py-3 px-4 fs-7 badge-light-success">Approved</span></td>';
                            }
                            if(data[count].is_lock == 0){

                                output += '<td><span class="badge py-3 px-4 fs-7 badge-light-success">Active</span></td>';
                            }
                            else{
                                output += '<td><span class="badge py-3 px-4 fs-7 badge-light-danger">Locked</span></td>';
                            }
                            if(data[count].role_id == 1){

                                output += '<td><div class=" flex-shrink-0"><button type="button"  class="btn  btn-light mb-5" onclick="super_admin()"><i class="fas fa-pencil-alt" id="fa"></i></button></div></td>';
                            }
                            else{
                                output += '<td><div class=" flex-shrink-0"><button type="button" id="kt_sign_in_submit" class="btn  btn-light mb-5" data-system_id="'+data[count].id+'" name="edit"><i class="fas fa-pencil-alt" id="fa"></i></button></div></td>';
                            }
                            output += '</tr>';
                        }
                    }
                    else
                    {
                        output += '<tr>';
                        output += '<td class= "fw-bold" colspan="6">No Data Found</td>';
                        output += '</tr>';
                    }
                    $('tbody').html(output);
                }
            });  
        });
    });
</script>

<!-- profile -->
<script type="application/javascript">
    jQuery(document).ready(function ()
    {
        jQuery('select[name="profile_search"]').on('change',function(){
            var profile = jQuery(this).val();
            var search = jQuery("#search").val();
            console.log(profile);
            console.log(search);
            jQuery.ajax({
                url : 'user_profile',
                type: 'GET',
                dataType: 'json',
                data: { "search": search,"profile" : profile},
                success:function(data)
                {
                    console.log(data);
                    var output = '';
                    if(data.length > 0){
                        for(var count = 0; count < data.length; count++)
                        {
                            var directory = 'user/'+data[count].id+'/';
                            var image_url = 'storage/app/public/avatar/'+data[count].avatar+'/';
                            output += '<tr>';
                            if(data[count].avatar){
                                output += '<td><div class="d-flex align-items-center"><div class="symbol symbol-45px me-5"><img src="'+image_url+'" alt="" /></div><div class="d-flex justify-content-start flex-column"><a href="'+directory+'" class="text-dark fw-bolder text-hover-primary fs-6">'+data[count].first_name+' '+data[count].last_name+'</a><span class="text-muted fw-bold text-muted d-block fs-7">'+data[count].id+'</span></td>';

                            }
                            else{

                                output += '<td><div class="d-flex align-items-center"><div class="symbol symbol-45px me-5"><img src="{{ asset('public/assets/media/avatars/blank.png') }}" alt="" /></div><div class="d-flex justify-content-start flex-column"><a href="'+directory+'" class="text-dark fw-bolder text-hover-primary fs-6">'+data[count].first_name+' '+data[count].last_name+'</a><span class="text-muted fw-bold text-muted d-block fs-7">'+data[count].id+'</span></td>';

                            }

                            output += '<td>'+data[count].name+'</td>';
                            if(data[count].is_finanace == 0){
                                output += '<td>No</td>';
                            }
                            else{
                                output += '<td>Yes</td>';
                            }
                            if(data[count].is_tax == 0){
                                output += '<td>No</td>';
                            }
                            else{
                                output += '<td>Yes</td>';
                            }
                            if(data[count].is_profile_verified == 2){
                                output += '<td><span class="badge py-3 px-4 fs-7 badge-light-danger">Incomplete</span></td>';

                            }
                            else if(data[count].is_profile_verified == 0 || data[count].is_profile_updated == 1){

                                output += '<td><span class="badge py-3 px-4 fs-7 badge-light-warning">Pending</span></td>';
                            }
                            else{
                                output += '<td><span class="badge py-3 px-4 fs-7 badge-light-success">Verified</span></td>';
                            }
                            if(data[count].is_active == 0){

                                output += '<td><span class="badge py-3 px-4 fs-7 badge-light-warning">Pending</span></td>';
                            }
                            else{
                                output += '<td><span class="badge py-3 px-4 fs-7 badge-light-success">Approved</span></td>';
                            }
                            if(data[count].is_lock == 0){

                                output += '<td><span class="badge py-3 px-4 fs-7 badge-light-success">Active</span></td>';
                            }
                            else{
                                output += '<td><span class="badge py-3 px-4 fs-7 badge-light-danger">Locked</span></td>';
                            }
                            if(data[count].role_id == 1){

                                output += '<td><div class=" flex-shrink-0"><button type="button"  class="btn  btn-light mb-5" onclick="super_admin()"><i class="fas fa-pencil-alt" id="fa"></i></button></div></td>';
                            }
                            else{
                                output += '<td><div class=" flex-shrink-0"><button type="button" id="kt_sign_in_submit" class="btn  btn-light mb-5" data-system_id="'+data[count].id+'" name="edit"><i class="fas fa-pencil-alt" id="fa"></i></button></div></td>';
                            }
                            output += '</tr>';
                        }
                    }
                    else
                    {
                        output += '<tr>';
                        output += '<td class= "fw-bold" colspan="6">No Data Found</td>';
                        output += '</tr>';
                    }
                    $('tbody').html(output);
                }
            });  
        });
    });
</script>

<!-- role -->
<script type="application/javascript">
    jQuery(document).ready(function ()
    {
        jQuery('select[name="role_search"]').on('change',function(){
            var role = jQuery(this).val();
            var search = jQuery("#search").val();
            console.log(role);
            console.log(search);
            jQuery.ajax({
                url : 'user_role',
                type: 'GET',
                dataType: 'json',
                data: { "search": search,"role" : role},
                success:function(data)
                {
                    console.log(data);
                    var output = '';
                    if(data.length > 0){
                        for(var count = 0; count < data.length; count++)
                        {
                            var directory = 'user/'+data[count].id+'/';
                            var image_url = 'storage/app/public/avatar/'+data[count].avatar+'/';
                            output += '<tr>';
                            if(data[count].avatar){
                                output += '<td><div class="d-flex align-items-center"><div class="symbol symbol-45px me-5"><img src="'+image_url+'" alt="" /></div><div class="d-flex justify-content-start flex-column"><a href="'+directory+'" class="text-dark fw-bolder text-hover-primary fs-6">'+data[count].first_name+' '+data[count].last_name+'</a><span class="text-muted fw-bold text-muted d-block fs-7">'+data[count].id+'</span></td>';

                            }
                            else{

                                output += '<td><div class="d-flex align-items-center"><div class="symbol symbol-45px me-5"><img src="{{ asset('public/assets/media/avatars/blank.png') }}" alt="" /></div><div class="d-flex justify-content-start flex-column"><a href="'+directory+'" class="text-dark fw-bolder text-hover-primary fs-6">'+data[count].first_name+' '+data[count].last_name+'</a><span class="text-muted fw-bold text-muted d-block fs-7">'+data[count].id+'</span></td>';

                            }

                            output += '<td>'+data[count].name+'</td>';
                            if(data[count].is_finanace == 0){
                                output += '<td>No</td>';
                            }
                            else{
                                output += '<td>Yes</td>';
                            }
                            if(data[count].is_tax == 0){
                                output += '<td>No</td>';
                            }
                            else{
                                output += '<td>Yes</td>';
                            }
                            if(data[count].is_profile_verified == 2){
                                output += '<td><span class="badge py-3 px-4 fs-7 badge-light-danger">Incomplete</span></td>';

                            }
                            else if(data[count].is_profile_verified == 0 || data[count].is_profile_updated == 1){

                                output += '<td><span class="badge py-3 px-4 fs-7 badge-light-warning">Pending</span></td>';
                            }
                            else{
                                output += '<td><span class="badge py-3 px-4 fs-7 badge-light-success">Verified</span></td>';
                            }
                            if(data[count].is_active == 0){

                                output += '<td><span class="badge py-3 px-4 fs-7 badge-light-warning">Pending</span></td>';
                            }
                            else{
                                output += '<td><span class="badge py-3 px-4 fs-7 badge-light-success">Approved</span></td>';
                            }
                            if(data[count].is_lock == 0){

                                output += '<td><span class="badge py-3 px-4 fs-7 badge-light-success">Active</span></td>';
                            }
                            else{
                                output += '<td><span class="badge py-3 px-4 fs-7 badge-light-danger">Locked</span></td>';
                            }
                            if(data[count].role_id == 1){

                                output += '<td><div class=" flex-shrink-0"><button type="button"  class="btn  btn-light mb-5" onclick="super_admin()"><i class="fas fa-pencil-alt" id="fa"></i></button></div></td>';
                            }
                            else{
                                output += '<td><div class=" flex-shrink-0"><button type="button" id="kt_sign_in_submit" class="btn  btn-light mb-5" data-system_id="'+data[count].id+'" name="edit"><i class="fas fa-pencil-alt" id="fa"></i></button></div></td>';
                            }
                            output += '</tr>';
                        }
                    }
                    else
                    {
                        output += '<tr>';
                        output += '<td class= "fw-bold" colspan="6">No Data Found</td>';
                        output += '</tr>';
                    }
                    $('tbody').html(output);
                }
            });  
        });
    });
</script>

<!-- investment_search -->
<script type="application/javascript">
    jQuery(document).ready(function ()
    {
        jQuery('input[name="investment_search"]').on('change',function(){
            var search = jQuery(this).val();
            jQuery.ajax({
                url : 'investment_search',
                type: 'GET',
                dataType: 'json',
                data: { "search": search},
                success:function(data)
                {
                    console.log(data.data);
                    var output = '';
                    if(data.data.length > 0){
                        for(var count = 0; count < data.data.length; count++)
                        {
                            var directory = 'user/'+data.data[count].user_id+'/';
                            var directory1 = 'view_finance/'+data.data[count].id+'/';
                            var image_url = 'storage/app/public/avatar/'+data.data[count].user_avatar+'/';
                            output += '<tr>';
                            if(data.data[count].user_avatar){
                                output += '<td><div class="d-flex align-items-center"><div class="symbol symbol-45px me-5"><img src="'+image_url+'" alt="" /></div><div class="d-flex justify-content-start flex-column"><a href="'+directory+'" class="text-dark fw-bolder text-hover-primary fs-6">'+data.data[count].user_firstname+' '+data.data[count].user_lastname+'</a><span class="text-muted fw-bold text-muted d-block fs-7">'+data.data[count].user_id+'</span></td>';

                            }
                            else{

                                output += '<td><div class="d-flex align-items-center"><div class="symbol symbol-45px me-5"><img src="{{ asset('public/assets/media/avatars/blank.png') }}" alt="" /></div><div class="d-flex justify-content-start flex-column"><a href="" class="text-dark fw-bolder text-hover-primary fs-6">'+data.data[count].user_firstname+' '+data.data[count].user_lastname+'</a><span class="text-muted fw-bold text-muted d-block fs-7">'+data.data[count].user_id+'</span></td>';
                            }
                            if(data.data[count].plan_type == 'month'){
                                output += '<td>Month</td>';
                            }
                            else{
                                output += '<td>Year</td>';
                            }

                            if(data.data[count].no_of_year !== null){
                                output += '<td>'+data.data[count].no_of_year+'</td>';
                            }
                            else{
                                output += '<td>-</td>';
                            }
                            output += '<td>'+data.data[count].amount+'</td>';
                            output += '<td>'+data.data[count].investment_date+'</td>';
                            if(data.data[count].accepted_date !== null){
                                output += '<td>'+data.data[count].accepted_date+'</td>';
                            }
                            else{
                                output += '<td>-</td>';
                            }
                            
                            output += '<td>'+data.data[count].percentage+'</td>';
                            if(data.data[count].is_status == 2){

                                output += '<td><span class="badge py-3 px-4 fs-7 badge-light-warning">Pending</span></td>';
                            }
                            else if(data.data[count].is_status == 1){
                                output += '<td><span class="badge py-3 px-4 fs-7 badge-light-success">Approved</span></td>';
                            }
                            else{
                                output += '<td><span class="badge py-3 px-4 fs-7 badge-light-danger">Rejected</span></td>';
                            }

                            output += '<td><button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary"name="approve"  data-system_id="'+data.data[count].id+'" title="Edit"><i class="fas fa-pencil-alt" id="fa"></i></button> <a class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" href="'+directory1+'"><span class="svg-icon svg-icon-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="black"></rect><path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="black"></path></svg></span></a> </td>';
                            output += '</tr>';
                        }
                    }
                    else
                    {
                        output += '<tr>';
                        output += '<td colspan="6">No Data Found</td>';
                        output += '</tr>';
                    }
                    $('.investment_body').html(output);
                }
            });  
        });
    });
</script>

<!-- investment_status -->
<script type="application/javascript">
    jQuery(document).ready(function ()
    {
        jQuery('select[name="investment_status"]').on('change',function(){
            var status = jQuery(this).val();
            jQuery.ajax({
                url : 'investment_status',
                type: 'GET',
                dataType: 'json',
                data: { "status": status},
                success:function(data)
                {

                    console.log(data.data);
                    var output = '';
                    if(data.data.length > 0){
                        for(var count = 0; count < data.data.length; count++)
                        {
                            var directory = 'user/'+data.data[count].user_id+'/';
                            var directory1 = 'view_finance/'+data.data[count].id+'/';
                            var image_url = 'storage/app/public/avatar/'+data.data[count].user_avatar+'/';
                            output += '<tr>';
                            if(data.data[count].user_avatar){
                                output += '<td><div class="d-flex align-items-center"><div class="symbol symbol-45px me-5"><img src="'+image_url+'" alt="" /></div><div class="d-flex justify-content-start flex-column"><a href="'+directory+'" class="text-dark fw-bolder text-hover-primary fs-6">'+data.data[count].user_firstname+' '+data.data[count].user_lastname+'</a><span class="text-muted fw-bold text-muted d-block fs-7">'+data.data[count].user_id+'</span></td>';

                            }
                            else{

                                output += '<td><div class="d-flex align-items-center"><div class="symbol symbol-45px me-5"><img src="{{ asset('public/assets/media/avatars/blank.png') }}" alt="" /></div><div class="d-flex justify-content-start flex-column"><a href="" class="text-dark fw-bolder text-hover-primary fs-6">'+data.data[count].user_firstname+' '+data.data[count].user_lastname+'</a><span class="text-muted fw-bold text-muted d-block fs-7">'+data.data[count].user_id+'</span></td>';
                            }
                            if(data.data[count].plan_type == 'month'){
                                output += '<td>Month</td>';
                            }
                            else{
                                output += '<td>Year</td>';
                            }

                            if(data.data[count].no_of_year !== null){
                                output += '<td>'+data.data[count].no_of_year+'</td>';
                            }
                            else{
                                output += '<td>-</td>';
                            }
                            output += '<td>'+data.data[count].amount+'</td>';
                            output += '<td>'+data.data[count].investment_date+'</td>';
                            if(data.data[count].accepted_date !== null){
                                output += '<td>'+data.data[count].accepted_date+'</td>';
                            }
                            else{
                                output += '<td>-</td>';
                            }
                            
                            output += '<td>'+data.data[count].percentage+'</td>';
                            if(data.data[count].is_status == 2){

                                output += '<td><span class="badge py-3 px-4 fs-7 badge-light-warning">Pending</span></td>';
                            }
                            else if(data.data[count].is_status == 1){
                                output += '<td><span class="badge py-3 px-4 fs-7 badge-light-success">Approved</span></td>';
                            }
                            else{
                                output += '<td><span class="badge py-3 px-4 fs-7 badge-light-danger">Rejected</span></td>';
                            }

                            output += '<td><button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary"name="approve"  data-system_id="'+data.data[count].id+'" title="Edit"><i class="fas fa-pencil-alt" id="fa"></i></button> <a class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" href="'+directory1+'"><span class="svg-icon svg-icon-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="black"></rect><path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="black"></path></svg></span></a> </td>';
                            output += '</tr>';
                        }
                    }
                    else
                    {
                        output += '<tr>';
                        output += '<td colspan="6">No Data Found</td>';
                        output += '</tr>';
                    }
                    $('.investment_body').html(output); 
                    
                }
            });  
        });
    });
</script>

<!-- investment_plan filter -->
<script type="application/javascript">
    jQuery(document).ready(function ()
    {
        jQuery('select[name="investment_plan"]').on('change',function(){
            var plan = jQuery(this).val();
            jQuery.ajax({
                url : 'investment_plan',
                type: 'GET',
                dataType: 'json',
                data: { "plan": plan},
                success:function(data)
                {

                    console.log(data.data);
                    var output = '';
                    if(data.data.length > 0){
                        for(var count = 0; count < data.data.length; count++)
                        {
                            var directory = 'user/'+data.data[count].user_id+'/';
                            var directory1 = 'view_finance/'+data.data[count].id+'/';
                            var image_url = 'storage/app/public/avatar/'+data.data[count].user_avatar+'/';
                            output += '<tr>';
                            if(data.data[count].user_avatar){
                                output += '<td><div class="d-flex align-items-center"><div class="symbol symbol-45px me-5"><img src="'+image_url+'" alt="" /></div><div class="d-flex justify-content-start flex-column"><a href="'+directory+'" class="text-dark fw-bolder text-hover-primary fs-6">'+data.data[count].user_firstname+' '+data.data[count].user_lastname+'</a><span class="text-muted fw-bold text-muted d-block fs-7">'+data.data[count].user_id+'</span></td>';

                            }
                            else{

                                output += '<td><div class="d-flex align-items-center"><div class="symbol symbol-45px me-5"><img src="{{ asset('public/assets/media/avatars/blank.png') }}" alt="" /></div><div class="d-flex justify-content-start flex-column"><a href="" class="text-dark fw-bolder text-hover-primary fs-6">'+data.data[count].user_firstname+' '+data.data[count].user_lastname+'</a><span class="text-muted fw-bold text-muted d-block fs-7">'+data.data[count].user_id+'</span></td>';
                            }
                            if(data.data[count].plan_type == 'month'){
                                output += '<td>Month</td>';
                            }
                            else{
                                output += '<td>Year</td>';
                            }

                            if(data.data[count].no_of_year !== null){
                                output += '<td>'+data.data[count].no_of_year+'</td>';
                            }
                            else{
                                output += '<td>-</td>';
                            }
                            output += '<td>'+data.data[count].amount+'</td>';
                            output += '<td>'+data.data[count].investment_date+'</td>';
                            if(data.data[count].accepted_date !== null){
                                output += '<td>'+data.data[count].accepted_date+'</td>';
                            }
                            else{
                                output += '<td>-</td>';
                            }
                            
                            output += '<td>'+data.data[count].percentage+'</td>';
                            if(data.data[count].is_status == 2){

                                output += '<td><span class="badge py-3 px-4 fs-7 badge-light-warning">Pending</span></td>';
                            }
                            else if(data.data[count].is_status == 1){
                                output += '<td><span class="badge py-3 px-4 fs-7 badge-light-success">Approved</span></td>';
                            }
                            else{
                                output += '<td><span class="badge py-3 px-4 fs-7 badge-light-danger">Rejected</span></td>';
                            }

                            output += '<td><button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary"name="approve"  data-system_id="'+data.data[count].id+'" title="Edit"><i class="fas fa-pencil-alt" id="fa"></i></button> <a class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" href="'+directory1+'"><span class="svg-icon svg-icon-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="black"></rect><path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="black"></path></svg></span></a> </td>';
                            output += '</tr>';
                        }
                    }
                    else
                    {
                        output += '<tr>';
                        output += '<td colspan="6">No Data Found</td>';
                        output += '</tr>';
                    }
                    $('.investment_body').html(output); 
                    
                }
            });  
        });
    });
</script>



<!-- profile page validation -->
<script type="text/javascript">

    function additional_next() {
        var alertText = "";
        // if (!document.getElementById("amount").value) {
        //     alertText = alertText+"Amount is required";
        // }
        // var amount = document.getElementById("amount").value;
        // if(amount){
        //    if(amount < 100000)
        //     {
        //         alertText = alertText+"<br>Minimum amount should be 1,00000";
        //     } 
        // }
        if (!document.getElementById("address").value) {
            alertText = alertText+"Address is required";
        }
        if (!document.getElementById("city").value) {
            alertText = alertText+"<br>City is required";
        }
        if (!document.getElementById("pincode").value) {
            alertText = alertText+"<br>Pincode is required";
        }
        var pincode = document.getElementById("pincode").value;
        if(pincode){
            format = new RegExp("^[1-9][0-9]{5}$");
            if(!format.test(pincode))
            {
                alertText = alertText+"<br>Pincode should be in format 123456";
            } 
        }
        var email = document.getElementById("email").value;
        if(email){
            format = /^[a-zA-Z0-9\._-]+@[a-zA-Z0-9-]{2,}[.][a-zA-Z]{2,4}$/;
            if(!format.test(email))
            {
                alertText = alertText+"<br>Email should be in format example@domain.com";
            } 
        }
        // if (!document.getElementById("transaction_id").value) {
        //     alertText = alertText+"<br>Transaction ID is required";
        // }
        // if (!document.getElementById("payment_copy").value) {
        //     alertText = alertText+"<br>Payment Copy is required";
        // }

        if (alertText != "") {
            var div = document.getElementById("error");
            div.innerHTML = '';
            div.style.display = "block";
            $( ".error" ).html('');
            var html ='<div class="alert alert-danger" role="alert">'+alertText+'</div>';
             $('.error').html(html);
        }
        else{
            var div = document.getElementById("error");
            div.innerHTML = '';
            div.style.display = "none";
            document.getElementById("personal_details").classList.remove("current");
            document.getElementById("additional_details").classList.add("current");
            document.getElementById("personal").classList.remove("current");
            document.getElementById("additional").classList.add("current");
        }
    }

    function personal_previous() {
        var div = document.getElementById("error");
        div.innerHTML = '';
        div.style.display = "none";
        document.getElementById("personal_details").classList.add("current");
        document.getElementById("additional_details").classList.remove("current");
        document.getElementById("personal").classList.add("current");
        document.getElementById("additional").classList.remove("current");
    }

    function bank_next() {

        var alertText = "";
        //Mobile
        if (!document.getElementById("phone").value) {
            alertText = alertText+"Mobile number is required";
        }
        var phone = document.getElementById("phone").value;
        if(phone){
            format = /^\d{10}$/;
            if(!format.test(phone))
            {
                alertText = alertText+"<br>Mobile Number should be in 10 digits";
            } 
        }
        //Aadhar Number
        if (!document.getElementById("aadhaar_no").value) {
            alertText = alertText+"<br>Aadhaar number is required";
        }
        var aadhaar_no = document.getElementById("aadhaar_no").value;
        if(aadhaar_no){
            format = /^\d{12}$/;
            if(!format.test(aadhaar_no))
            {
                alertText = alertText+"<br>Aadhaar number is not valid";
            } 
        }
        //Pan Number
        if (!document.getElementById("pan_card_no").value) {
            alertText = alertText+"<br>Pan card number is required";
        }
        var pan_card_no = document.getElementById("pan_card_no").value;
        if(pan_card_no){
            format = /([A-Z]){5}([0-9]){4}([A-Z]){1}$/;
            if(!format.test(pan_card_no))
            {
                alertText = alertText+"<br>Pan card number is not valid";
            } 
        }
        //Avatar
        if (!document.getElementById("avatar").value) {
            alertText = alertText+"<br>User photo is required";
        }
        //Aadhaar Card
        if (!document.getElementById("aadhaar_card").value) {
            alertText = alertText+"<br>Aadhaar card photo is required";
        }
        //Pan Card
        if (!document.getElementById("pan_card").value) {
            alertText = alertText+"<br>Pan card photo is required";
        }

        if (alertText != "") {
            var div = document.getElementById("error");
            div.innerHTML = '';
            div.style.display = "block";
            $( ".error" ).html('');
            var html ='<div class="alert alert-danger" role="alert">'+alertText+'</div>';
             $('.error').html(html);
        }
        else{
            var div = document.getElementById("error");
            div.innerHTML = '';
            div.style.display = "none";
            document.getElementById("bank_details").classList.add("current");
            document.getElementById("additional_details").classList.remove("current");
            document.getElementById("bank").classList.add("current");
            document.getElementById("additional").classList.remove("current");
        }
    }

    function additional_previous() {
        var div = document.getElementById("error");
        div.innerHTML = '';
        div.style.display = "none";
        document.getElementById("bank_details").classList.remove("current");
        document.getElementById("additional_details").classList.add("current");
        document.getElementById("bank").classList.remove("current");
        document.getElementById("additional").classList.add("current");
        
    }

    function nominee_next() {
        var alertText = "";
        //Holder Name
        if (!document.getElementById("holder_name").value) {
            alertText = alertText+"Account Name is required";
        }
        //Account Number
        if (!document.getElementById("account_no").value) {
            alertText = alertText+"<br>Account Number is required";
        }
        //IFSC code
        if (!document.getElementById("ifsc_code").value) {
            alertText = alertText+"<br>IFSC code is required";
        }
        var ifsc_code = document.getElementById("ifsc_code").value;
        if(ifsc_code){
            format = /^[A-Z]{4}0[0-9]{6}$/;
            if(!format.test(ifsc_code))
            {
                alertText = alertText+"<br>IFSC code is not valid";
            } 
        }
        //Branch
        if (!document.getElementById("branch").value) {
            alertText = alertText+"<br>Branch is required";
        }
        //Branch
        if (!document.getElementById("city").value) {
            alertText = alertText+"<br>City is required";
        }

        if (alertText != "") {
            var div = document.getElementById("error");
            div.innerHTML = '';
            div.style.display = "block";
            $( ".error" ).html('');
            var html ='<div class="alert alert-danger" role="alert">'+alertText+'</div>';
             $('.error').html(html);
        }
        else{
            var div = document.getElementById("error");
            div.innerHTML = '';
            div.style.display = "none";
            document.getElementById("nominee_details").classList.add("current");
            document.getElementById("bank_details").classList.remove("current");
            document.getElementById("nominee").classList.add("current");
            document.getElementById("bank").classList.remove("current");
        }
    }

    function bank_previous() {
        var div = document.getElementById("error");
        div.innerHTML = '';
        div.style.display = "none";
        document.getElementById("nominee_details").classList.remove("current");
        document.getElementById("bank_details").classList.add("current");
        document.getElementById("nominee").classList.remove("current");
        document.getElementById("bank").classList.add("current");
        
    }

    function final() {
        var alertText = "";
        //Nominee Name
        if (!document.getElementById("nominee_name").value) {
            alertText = alertText+"Name is required";
        }
        //Relationship
        if (!document.getElementById("relationship").value) {
            alertText = alertText+"<br>Relationship is required";
        }
        //Age
        if (!document.getElementById("age").value) {
            alertText = alertText+"<br>Age is required";
        }
        //Aadhar Number
        if (!document.getElementById("nominee_aadhaar_no").value) {
            alertText = alertText+"<br>Aadhaar number is required";
        }
        var nominee_aadhaar_no = document.getElementById("nominee_aadhaar_no").value;
        if(nominee_aadhaar_no){
            format = /^\d{12}$/;
            if(!format.test(nominee_aadhaar_no))
            {
                alertText = alertText+"<br>Aadhaar number is not valid";
            } 
        }
        //Aadhar card
        if (!document.getElementById("nominee_aadhar").value) {
            alertText = alertText+"<br>Aadhaar card is required";
        }

        if (alertText != "") {
            var div = document.getElementById("error");
            div.innerHTML = '';
            div.style.display = "block";
            $( ".error" ).html('');
            var html ='<div class="alert alert-danger" role="alert">'+alertText+'</div>';
             $('.error').html(html);
        }
        else{

            $('#submit').show();
        }
    }
</script>

<!-- <script type="text/javascript">
    $(document).ready(function (e) {
        $('#payment_copy').change(function(){
            let reader = new FileReader();
            reader.onload = (e) => { 
                $('#preview-image-payment_copy').attr('src', e.target.result); 
            }
            reader.readAsDataURL(this.files[0]); 
       });
    });
</script> -->

<!-- avatar image -->
<script type="text/javascript">    
    $(document).ready(function (e) { 
       $('#avatar').change(function(){   
            let reader = new FileReader();
            reader.onload = (e) => { 
                $('#preview-image-avatar').attr('src', e.target.result); 
            }
            reader.readAsDataURL(this.files[0]); 
       });

    });
</script>

<!-- aadhaar card -->
<script type="text/javascript">    
    $(document).ready(function (e) {
       
       $('#aadhaar_card').change(function(){   
            let reader = new FileReader();
            reader.onload = (e) => { 
                $('#preview-image-aadhaar_card').attr('src', e.target.result); 
            }
            reader.readAsDataURL(this.files[0]); 
       });

    });
</script>

<!-- pan card -->
<script type="text/javascript">    
    $(document).ready(function (e) {
       $('#pan_card').change(function(){   
            let reader = new FileReader();
            reader.onload = (e) => { 
                $('#preview-image-pan_card').attr('src', e.target.result); 
            }
            reader.readAsDataURL(this.files[0]); 
       });
    });
</script>

<!-- <script type="text/javascript">    
    $(document).ready(function (e) {
       $('#nominee_photo').change(function(){   
            let reader = new FileReader();
            reader.onload = (e) => { 
                $('#preview-image-nominee_photo').attr('src', e.target.result); 
            }
            reader.readAsDataURL(this.files[0]); 
       });
    });
</script> -->

<!-- nominee_aadhar_card -->
<script type="text/javascript">    
    $(document).ready(function (e) {
       $('#nominee_aadhar').change(function(){   
            let reader = new FileReader();
            reader.onload = (e) => { 
                $('#preview-image-nominee_aadhar').attr('src', e.target.result); 
            }
            reader.readAsDataURL(this.files[0]); 
       });
    });
</script>

<!-- usermanagement -->
<script type="text/javascript">

    $(document).on('click', 'button[name^="edit"]', function(e) {
        var system_id = $(this).data("system_id");
        console.log(system_id);

        if(system_id)
        {
            jQuery.ajax({
                url : 'get_user',
                type: 'GET',
                dataType: 'json',
                data: { id: system_id },
                success:function(data)
                { 
                    jQuery('#edit_modal').modal('show');
                    document.getElementById("user_id").value = data.id;
                    document.getElementById("user_name").value = data.first_name+ ' '+ data.last_name;
                    document.getElementById("user_email").value = data.email;
                    if(data.is_active == 1)
                    {
                        jQuery('select[name="progress"]').empty();
                        $('select[name="progress"]').append('<option value="'+ '1' +'" selected>'+ 'Approved' +'</option>');
                        $('select[name="progress"]').append('<option value="'+ '0' +'">'+ 'Pending' +'</option>');
                        $('select[name="progress"]').append('<option value="'+ '3' +'">'+ 'Rejected' +'</option>');
                    }
                    else if(data.is_active == 3){
                        jQuery('select[name="progress"]').empty();
                        $('select[name="progress"]').append('<option value="'+ '3' +'" selected>'+ 'Rejected' +'</option>');
                        $('select[name="progress"]').append('<option value="'+ '0' +'">'+ 'Pending' +'</option>');
                        $('select[name="progress"]').append('<option value="'+ '1' +'">'+ 'Approved' +'</option>');
                    }
                    else{
                        jQuery('select[name="progress"]').empty();
                        $('select[name="progress"]').append('<option value="'+ '0' +'" selected>'+ 'Pending' +'</option>');
                        $('select[name="progress"]').append('<option value="'+ '1' +'">'+ 'Approved' +'</option>');
                        $('select[name="progress"]').append('<option value="'+ '3' +'">'+ 'Rejected' +'</option>');
                    }
                    if(data.is_lock == 1)
                    {
                        jQuery('select[name="status"]').empty();
                        $('select[name="status"]').append('<option value="'+ '1' +'" selected>'+ 'Locked' +'</option>');
                        $('select[name="status"]').append('<option value="'+ '0' +'">'+ 'Active' +'</option>');
                    }
                    else{
                        jQuery('select[name="status"]').empty();
                        $('select[name="status"]').append('<option value="'+ '0' +'" selected>'+ 'Active' +'</option>');
                        $('select[name="status"]').append('<option value="'+ '1' +'">'+ 'Locked' +'</option>');
                    }
                    if(data.role_id == 1){
                        jQuery('select[name="role"]').empty();
                        $('select[name="role"]').append('<option value="'+ '1' +'" selected>'+ 'Super Admin' +'</option>');
                        $('select[name="role"]').append('<option value="'+ '2' +'">'+ 'Admin' +'</option>');
                        $('select[name="role"]').append('<option value="'+ '3' +'">'+ 'User' +'</option>');
                    }
                    else if (data.role_id == 2) {
                        jQuery('select[name="role"]').empty();
                        $('select[name="role"]').append('<option value="'+ '1' +'" >'+ 'Super Admin' +'</option>');
                        $('select[name="role"]').append('<option value="'+ '2' +'" selected>'+ 'Admin' +'</option>');
                        $('select[name="role"]').append('<option value="'+ '3' +'">'+ 'User' +'</option>');
                    }
                    else{
                        jQuery('select[name="role"]').empty();
                        $('select[name="role"]').append('<option value="'+ '1' +'" >'+ 'Super Admin' +'</option>');
                        $('select[name="role"]').append('<option value="'+ '2' +'">'+ 'Admin' +'</option>');
                        $('select[name="role"]').append('<option value="'+ '3' +'" selected>'+ 'User' +'</option>');
                    }
                    if(data.is_profile_verified == 1 && data.is_profile_updated == 0)
                    {
                        jQuery('select[name="profile"]').empty();
                        $('select[name="profile"]').append('<option value="'+ '1' +'" selected>'+ 'Approved' +'</option>');
                        $('select[name="profile"]').append('<option value="'+ '0' +'">'+ 'Pending' +'</option>');
                        $('select[name="profile"]').append('<option value="'+ '3' +'">'+ 'Rejected' +'</option>');
                    }
                    else if(data.is_profile_verified == 2){
                        jQuery('select[name="profile"]').empty();
                        $('select[name="profile"]').append('<option value="'+ '2' +'" selected>'+ 'Incomplete' +'</option>');

                    }
                    else if(data.is_profile_verified == 3){
                         $('select[name="profile"]').append('<option value="'+ '3' +'" selected>'+ 'Rejected' +'</option>');
                        $('select[name="profile"]').append('<option value="'+ '0' +'">'+ 'Pending' +'</option>');
                        $('select[name="profile"]').append('<option value="'+ '1' +'">'+ 'Approved' +'</option>');
                    }
                    else{
                        jQuery('select[name="profile"]').empty();
                        $('select[name="profile"]').append('<option value="'+ '0' +'" selected>'+ 'Pending' +'</option>');
                        $('select[name="profile"]').append('<option value="'+ '1' +'">'+ 'Approved' +'</option>');
                        $('select[name="profile"]').append('<option value="'+ '3' +'">'+ 'Rejected' +'</option>');
                    }
                    if(data.is_reffer == 1)
                    {
                        jQuery('select[name="refferal"]').empty();
                        $('select[name="refferal"]').append('<option value="'+ '1' +'" selected>'+ 'Yes' +'</option>');
                        $('select[name="refferal"]').append('<option value="'+ '0' +'">'+ 'No' +'</option>');
                    }
                    else{
                        jQuery('select[name="refferal"]').empty();
                        $('select[name="refferal"]').append('<option value="'+ '0' +'" selected>'+ 'No' +'</option>');
                        $('select[name="refferal"]').append('<option value="'+ '1' +'">'+ 'Yes' +'</option>');
                    }

                }
            });
        }
        
    });

</script>

<!-- active navigation -->
<script type="text/javascript">
    function user() {
        document.getElementById("user_management").classList.add("active");
        document.getElementById("smart_finance").classList.remove("active");
        $('#user').show();
        $('#finance').hide();
        $('#admin_finance').hide();
    }

    function finance() {
        document.getElementById("user_management").classList.remove("active");
        document.getElementById("smart_finance").classList.add("active");
        $('#user').hide();
        $('#finance').show();
        $('#admin_finance').show();
    }

</script>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>

<script>
    @if (session('alert'))
        Swal.fire(
            "{{ session('alert') }}",
            ' ',
            'success'
        )
    @endif
</script>

<script type="text/javascript">
    function super_admin() {
        Swal.fire(
            'Super Admin Cant be Edit!',
            ' ',
            'success'
        )
    }
</script>

<!-- <script type="application/javascript">
    jQuery(document).ready(function ()
    {
        jQuery('select[name="role"]').on('change',function(){
            var role = jQuery(this).val();
            var user_id = jQuery("#user_id").val();

            if(role == '1' || role == '2')
            {
                jQuery.ajax({
                    url : 'get_user',
                    type: 'GET',
                    dataType: 'json',
                    data: { id: user_id },
                    success:function(data)
                    {
                        console.log(data);
                        if(data.is_profile_verified == 0){
                            Swal.fire(
                                'Cant able to change role user to admin, profile completion is not yet done!',
                                ' ',
                                'success'
                            )
                        }
                        else{

                        }   
                        
                    }
                });
            }
        });
    });
</script> -->

<!-- smartfinance -->
<script type="text/javascript">
    $(document).on('click', 'button[name^="approve"]', function(e) {
        var system_id = $(this).data("system_id");
        console.log(system_id);
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1; //January is 0!
        var yyyy = today.getFullYear();
        if(dd<10) {
          dd = '0'+dd
        } 

        if(mm<10) {
          mm = '0'+mm
        } 
        today = yyyy + '-' + mm + '-' + dd;
        console.log(today);
        if(system_id)
        {
            jQuery.ajax({
                url : 'get_smart_finance',
                type: 'GET',
                dataType: 'json',
                data: { id: system_id },
                success:function(data)
                { 
                    jQuery('#modal_approve_smart_finance').modal('show');
                    document.getElementById("finance_id").value = system_id;
                    $("#bill_bill").attr("src", data.bill);
                    $("#receipt").prop("href", data.bill);
                    document.getElementById("investment_date").value = data.investment_date;
                    if(data.accepted_date !== null){
                        document.getElementById("accepted_date").value = data.accepted_date;
                    }
                    else{
                        document.getElementById("accepted_date").value = today;

                    }
                    if(data.is_status == 1){
                        jQuery('select[name="is_status"]').empty();
                        $('select[name="is_status"]').append('<option value="" >'+ 'Select' +'</option>');
                        $('select[name="is_status"]').append('<option value="0">'+ 'Reject' +'</option>');
                        $('select[name="is_status"]').append('<option value="1" selected>'+ 'Approve' +'</option>');
                    }
                    else if(data.is_status == 0){

                        jQuery('select[name="is_status"]').empty();
                        $('select[name="is_status"]').append('<option value="" >'+ 'Select' +'</option>');
                        $('select[name="is_status"]').append('<option value="0" selected>'+ 'Reject' +'</option>');
                        $('select[name="is_status"]').append('<option value="1" >'+ 'Approve' +'</option>');

                    }

                }
            });
}

});
</script>
<!-- end-finance -->

<!-- approve-finance -->
<script type="text/javascript">
    function accept(){
        var intrest = jQuery("#intrest").val();
        var finance_id = jQuery("#finance_id").val();
        if(intrest){
            jQuery.ajax({
                url : 'approve_smart_finance',
                type: 'GET',
                dataType: 'json',
                data: { "finance_id": finance_id,"intrest" : intrest},
                success:function(data)
                {
                    console.log(data);
                    window.location.reload();

                }
            });
        }
        else{

            $( "#intrest_error" ).html('');
            var html ='<div class="alert alert-danger" role="alert">Intrest is required</div>';
             $('#intrest_error').html(html);
        }
    }
    
</script>
<!-- end-approve-finance -->

<!-- reject-finance -->
<script type="text/javascript">
    function reject(){
        var user_id = jQuery("#finance_user_id").val();
        jQuery.ajax({
            url : 'reject_smart_finance',
            type: 'GET',
            dataType: 'json',
            data: { "user_id": user_id},
            success:function(data)
            {
                console.log(data);
                window.location.reload();

            }
        });
    }
    
</script>
<!-- end-reject-finance -->


<!-- reffer -->
<script type="text/javascript">

    $(document).on('click', 'button[name^="reffer"]', function(e) {
        var system_id = $(this).data("system_id");
        console.log(system_id);

        if(system_id)
        {
            jQuery.ajax({
                url : 'get_users',
                type: 'GET',
                dataType: 'json',
                data: { id: system_id },
                success:function(data)
                { 
                    console.log(data);
                    jQuery('#refferal_modal').modal('show');
                    document.getElementById("userId").value = system_id;
                    jQuery('select[name="user"]').empty();
                    $('select[name="user"]').append('<option value="" selected>'+ 'Select' +'</option>');
                    
                    jQuery.each(data, function(key,value){
                        $('select[name="user"]').append('<option value="'+ value.id +'">'+value.first_name+' '+value.last_name+'</option>');
                    });
                }
            });
        }
        
    });

</script>

<!-- reffer amount -->
<script type="text/javascript">

    $(document).on('click', 'button[name^="reffer_amount"]', function(e) {
        var system_id = $(this).data("system_userid");
        console.log(system_id);

        if(system_id)
        {
            jQuery('#refferal_amount_modal').modal('show');
            document.getElementById("user_Id").value = system_id;
            
        }
        
    });

</script>


@endsection

@section('scripts')

@endsection