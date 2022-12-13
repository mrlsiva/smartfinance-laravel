@extends('layouts.master')
@section('body')

<style> 
    .parent-active .col {
        filter: grayscale(100%);
    }

     .col.active {
        filter: grayscale(0%);
    } 
    body{
        background-image: url(https://smartfinservice.com/public/assets/img/header-bg.jpg)!important;
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
                    <li class="breadcrumb-item text-white opacity-75"><i class="fa fa-envelope"></i>{{$auth->email}}&nbsp;&nbsp;<i class="fa fa-phone-square"></i>{{$auth->phone}}</li>
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
                                <a href="{{route('user_management')}}"  class="text-dark fw-bold fs-6 col  border-bottom border-warning bg-light-warning p-6 rounded-2 me-7 mb-7">
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
                                <a href="{{route('finance')}}" class=" text-dark fw-bold fs-6 col border-bottom border-warning bg-light-warning p-6 rounded-2 me-7 mb-7">                                   
                                    <div class="d-flex flex-stack flex-grow-1">
                                        <div class="d-flex flex-column me-2">       
                                            <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="currentColor" d="m6 16.5l-3 2.94V11h3m5 3.66l-1.57-1.34L8 14.64V7h3m5 6l-3 3V3h3m2.81 9.81L17 11h5v5l-1.79-1.79L13 21.36l-3.47-3.02L5.75 22H3l6.47-6.34L13 18.64"></path></svg>
                                            </span>            
                                        </div>
                                        <span class="symbol symbol-50px">
                                            <span class="px-3 py-1 fs-5 fw-bolder bg-warning text-white">{{$smartfinance_count+$payment_count}}</span>
                                        </span>
                                    </div>
                                    Smart Finance
                                </a>
                                <a href="{{route('loan')}}" class="active text-dark fw-bold fs-6 col border-bottom border-warning bg-light-warning p-6 rounded-2 me-7 mb-7">
                                                                    
                                    <div class="d-flex flex-stack flex-grow-1">
                                        <div class="d-flex flex-column me-2">
                                            <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" style="vertical-align: -0.125em;" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 64 64"><ellipse cx="10.97" cy="52.578" fill="currentColor" rx="1.742" ry="1.188"></ellipse><path fill="currentColor" d="m62 46.669l-.654-.384c-.05-.029-5.047-2.994-6.289-6.592l-.277-.797l-.512.669c-.016.021-.726.899-2.713 1.929c-1.471-8.373-6.475-18.369-13.051-22.631c1.88.152 3.766-.004 5.586-.666c1.096-.398.623-2.184-.483-1.78c-1.492.543-2.987.691-4.479.615c3.663-3.357 6.539-8.502 6.539-12.264c0-.904 0-2.587-1.34-2.587c-.538 0-.973.336-1.574.8c-.922.711-2.314 1.787-4.359 1.787c-.779 0-2.205-.822-3.351-1.482C33.658 2.489 32.773 2 32.029 2c-1.232 0-3.043.996-4.641 1.875c-.65.357-1.539.847-1.723.894c-2.316 0-3.661-1.068-4.553-1.775c-.52-.414-.897-.714-1.4-.714c-1.318 0-1.318 1.581-1.318 3.412c0 3.534 2.692 8.199 6.217 11.334c-2.221.159-4.411.83-5.95 2.321c-.85.822.438 2.126 1.285 1.306c1.279-1.24 2.956-1.771 4.75-1.874c.051.183.113.363.189.54C17.369 24.72 12.03 37.545 12.03 46.203c0 .854.066 1.627.168 2.355c-1.938-.861-2.645-1.616-2.659-1.633l-.516-.595l-.254.75c-1.123 3.304-6.005 6.17-6.054 6.199L2 53.694l.727.393c.255.138.508.259.763.39l-.46.319l.243 3.04L22.326 62l7.224-4.621c.729.004 1.467.006 2.218.006L40.212 62l19.089-6v-3.209l-.505-.303c.252-.16.504-.323.755-.491l.669-.447l-.147-.072l.851-.233l.144-3.336l-.492-.349c.262-.157.523-.317.785-.483l.639-.408M20.213 5.692c0-.444.006-.79.015-1.059c.153.12.331.251.521.386c.583 1.396 1.686 3.406 3.556 4.672c2.272 1.54 1.97-.23 3.182-1.846c1.212-1.615 2.032-2.461 4.062 1.693c.885 1.811 2.36-3.25 3.762-3.989c.371.202.741.39 1.104.55c2.514 4.088 3.679 2.813 5.912-.585c.614-.36 1.118-.746 1.519-1.055c.002.093.004.196.004.311c0 3.21-2.623 7.814-5.835 10.817a3.59 3.59 0 0 0-.642-1.053c-1.297-1.469-3.324.16-4.285 1.229c-1.705-.548-4.483-2.057-6.293-1.193a4.61 4.61 0 0 0-1.226.831c-2.96-2.698-5.356-6.593-5.356-9.709m16.204 10.974a26.467 26.467 0 0 1-1.337-.32c.558-.481 1.07-.649 1.285.066c.023.078.037.167.052.254m-7.6.621c-.331-.063-.671-.12-1.021-.165a14.18 14.18 0 0 1-.779-.525c.914-.613 2.49-.287 3.996.224c-.743.075-1.476.237-2.196.466m.454 2.64c-.56.14-1.17.084-1.697-.126c.214-.113.43-.211.646-.31c.35.169.7.31 1.051.436M10.774 56.379a39.327 39.327 0 0 1-6.912-2.733c1.357-.892 4.313-3.049 5.515-5.641c.824.647 2.726 1.827 6.43 2.733c-.063.102-.14.211-.214.318c-3.162-.828-4.96-1.875-4.989-1.893l-.436-.26l-.209.467c-.275.612-.92.704-1.279.704c-.1 0-.167-.007-.176-.008l-.357-.052l-.13.342c-.266.698-1.358 1.61-1.758 1.903l-.668.49l.764.313c.284.116.361.223.365.251c.01.069-.111.251-.24.356l-.582.469l.677.313c1.387.64 2.958 1.17 4.529 1.607c-.125.123-.233.228-.33.321m8.064-3.726c1.398.196 2.947.32 4.639.32h.001c.352 0 .709-.006 1.073-.017a.851.851 0 0 0 .103.213c.089.135.209.247.361.334l-2.552 2.181a3.216 3.216 0 0 0-.146-.003c-1.137 0-1.985.418-2.392 1.162a68.481 68.481 0 0 1-4.602-.747a51.413 51.413 0 0 0 3.515-3.443M7.489 53.85c.1-.189.165-.418.13-.668a1.016 1.016 0 0 0-.307-.59c.449-.385 1.068-.979 1.408-1.594c.773-.011 1.411-.304 1.813-.822c.677.354 2.202 1.069 4.455 1.689c-.921 1.155-2.162 2.465-3.127 3.439c-1.504-.398-3.019-.878-4.372-1.454m14.251 4.209l-.205.001c-.861 0-3.714-.07-7.483-.855c.132-.112.269-.227.396-.337c3.058.639 5.524.913 5.709.934l.366.039l.113-.355c.247-.766 1.158-.879 1.68-.879c.143 0 .238.009.249.01l.194.021l4.433-3.788l-1.185-.039c-.396-.014-.563-.103-.604-.164l.251-.657l-.694.029c-.506.022-1 .033-1.483.033h-.001c-1.396 0-2.691-.092-3.888-.237l.278-.328c2.416.323 5.309.522 8.802.497c-.834 1.17-2.914 3.657-6.928 6.075m10.024-4.345v1.825c-.569 0-1.123-.002-1.665-.006l-.163-2.054l-1.354.11c.912-1.078 1.301-1.797 1.336-1.862l.367-.694l-.775.014c-7.418.136-12.256-.748-15.31-1.73c-.223-.902-.352-1.922-.352-3.113c0-8.123 5.191-20.401 12.083-25.377c1.221 1.181 3.073 1.698 4.833.549c.386-.252.722-.582 1.037-.933c.075.002.152.019.228.019c.252 0 .508-.021.763-.053c.323.129.639.259.932.388c1.403.618 2.601.234 3.419-.618c6.313 3.82 11.371 13.925 12.702 22.093c-2.886 1.154-7.464 2.28-14.49 2.478c1.386-.792 2.426-2.124 2.052-3.874c-.393-1.85-1.939-2.37-3.54-2.455c-.004-.869-.004-1.736.002-2.605c.491.217.962.467 1.39.734c.756.475 1.44-.756.689-1.231a10.293 10.293 0 0 0-2.072-.999c.01-1.006.015-2.01.015-3.014c.001-.92-1.366-.92-1.366 0c0 .883-.006 1.765-.014 2.646a7.1 7.1 0 0 0-2.202-.037a26.48 26.48 0 0 0-.432-1.97c-.226-.886-1.546-.511-1.317.378c.168.639.305 1.275.418 1.92c-.058.022-.121.033-.178.059c-1.852.733-2.982 2.602-1.627 4.345c.631.812 1.456 1.14 2.359 1.249c.049 1.203.08 2.407.115 3.609c-.605-.393-1.156-.897-1.655-1.43c-.618-.652-1.583.355-.966 1.006c.839.893 1.72 1.568 2.675 2c.043 1.027.104 2.057.204 3.079c.088.907 1.456.912 1.367 0a53.716 53.716 0 0 1-.187-2.657c.52.09 1.066.113 1.646.058c.065.946.141 1.892.249 2.838c.062.542.58.755.962.645l-.085 1.964c-.602.054-1.216.104-1.856.146l-.762.05l.406.656c.041.066.502.795 1.531 1.856h-1.412zm24.888-6.582c-1.257.591-2.847 1.133-4.467 1.606c-.996-1.029-2.27-2.402-3.221-3.62c2.119-.642 3.305-1.304 3.84-1.661c.423.373.983.567 1.646.566c.22 0 .415-.021.565-.045c.48.622 1.254 1.34 1.738 1.769c-.229.235-.34.495-.331.776c.008.24.104.444.23.609m-7.155 3.286c.204.18.415.364.63.55c-4.054 1.075-7.071 1.192-7.728 1.203c-4.198-2.561-6.374-5.271-7.213-6.491c3.513-.088 6.417-.406 8.839-.844a24 24 0 0 0 .299.36a53.115 53.115 0 0 1-5.877.583l-.807.034l.444.679c-.001.001-.091.169-.687.285l-.969.189l4.764 3.857l.222-.06c.005-.001.425-.114.933-.114c.733 0 1.234.223 1.486.659l.16.276l.311-.055a87.25 87.25 0 0 0 5.193-1.111M35.4 47.479l-1.138-.062c-.053-.568-.106-1.136-.146-1.704c.2.332.61.956 1.284 1.766m-1.408-3.661a105.002 105.002 0 0 1-.119-4.041c.164.006.326.021.48.043c1.768.268 2.23 2.234.85 3.34c-.36.285-.775.494-1.211.658m10.439 6.752c-.448-.553-1.161-.843-2.083-.843c-.385 0-.724.052-.938.094l-2.995-2.427c.249-.143.417-.324.509-.546a.953.953 0 0 0 .052-.171c2.374-.13 4.374-.367 6.065-.657c.82.915 2.025 2.177 3.623 3.644c-1.963.467-3.6.787-4.233.906M32.505 39.813c.019 1.449.055 2.902.132 4.35c-.129.02-.256.045-.383.058c-.43.049-.838.013-1.226-.085c-.049-1.4-.081-2.803-.134-4.204c.538-.025 1.083-.078 1.611-.119m-1.68-1.265a44.292 44.292 0 0 0-.31-3.286a5.34 5.34 0 0 1 1.987.101a285.006 285.006 0 0 0-.005 3.067c-.439.024-.856.066-1.223.099a6.32 6.32 0 0 1-.449.019m-1.372-.175c-.085-.023-.169-.041-.256-.07a2.671 2.671 0 0 1-1.057-.667c-.854-.797.318-1.579 1.057-1.95c.116.89.196 1.788.256 2.687M40.49 57.839c-4.341-2.218-6.67-4.683-7.595-5.825c.665-.05 1.294-.11 1.917-.173l7.118 4.62l15.61-4.288c-8.05 4.852-16.003 5.591-17.05 5.666m12.892-7.89c-.128-.128-.281-.28-.462-.463c1.776-.538 3.494-1.162 4.775-1.848l.779-.419l-.79-.402c-.177-.091-.35-.258-.353-.321c.002-.024.072-.152.375-.326l.578-.332l-.514-.428c-.016-.013-1.619-1.344-2.182-2.201l-.186-.28l-.319.093c-.003 0-.277.079-.633.079c-.55.001-.962-.179-1.226-.533l-.292-.387l-.366.315c-.019.016-1.152.945-4.191 1.823a10.25 10.25 0 0 1-.289-.44c3.685-1.117 5.568-2.469 6.384-3.209c1.31 2.834 4.429 5.117 5.783 6.012a37.972 37.972 0 0 1-6.871 3.267"></path><path fill="currentColor" d="M44.38 47.117c-.997-.271-2.122-.086-2.516.409c-.391.497.103 1.123 1.099 1.396c.998.271 2.122.085 2.516-.411c.391-.497-.101-1.121-1.099-1.394"></path></svg>
                                            </span>         
                                        </div>
                                        <span class="symbol symbol-50px">
                                            <span class="px-3 py-1 fs-5 fw-bolder bg-warning text-white">{{$loan_count+$loan_payment_count}}</span>
                                        </span>
                                    </div>
                                    Loan
                                </a>
                                <a href="{{route('tax')}}"class="text-dark fw-bold fs-6 col border-bottom border-warning bg-light-warning p-6 rounded-2 me-7 mb-7">
                                                                    
                                    <div class="d-flex flex-stack flex-grow-1">
                                        <div class="d-flex flex-column me-2">
                                            <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" style="vertical-align: -0.125em;" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 64 64"><ellipse cx="10.97" cy="52.578" fill="currentColor" rx="1.742" ry="1.188"></ellipse><path fill="currentColor" d="m62 46.669l-.654-.384c-.05-.029-5.047-2.994-6.289-6.592l-.277-.797l-.512.669c-.016.021-.726.899-2.713 1.929c-1.471-8.373-6.475-18.369-13.051-22.631c1.88.152 3.766-.004 5.586-.666c1.096-.398.623-2.184-.483-1.78c-1.492.543-2.987.691-4.479.615c3.663-3.357 6.539-8.502 6.539-12.264c0-.904 0-2.587-1.34-2.587c-.538 0-.973.336-1.574.8c-.922.711-2.314 1.787-4.359 1.787c-.779 0-2.205-.822-3.351-1.482C33.658 2.489 32.773 2 32.029 2c-1.232 0-3.043.996-4.641 1.875c-.65.357-1.539.847-1.723.894c-2.316 0-3.661-1.068-4.553-1.775c-.52-.414-.897-.714-1.4-.714c-1.318 0-1.318 1.581-1.318 3.412c0 3.534 2.692 8.199 6.217 11.334c-2.221.159-4.411.83-5.95 2.321c-.85.822.438 2.126 1.285 1.306c1.279-1.24 2.956-1.771 4.75-1.874c.051.183.113.363.189.54C17.369 24.72 12.03 37.545 12.03 46.203c0 .854.066 1.627.168 2.355c-1.938-.861-2.645-1.616-2.659-1.633l-.516-.595l-.254.75c-1.123 3.304-6.005 6.17-6.054 6.199L2 53.694l.727.393c.255.138.508.259.763.39l-.46.319l.243 3.04L22.326 62l7.224-4.621c.729.004 1.467.006 2.218.006L40.212 62l19.089-6v-3.209l-.505-.303c.252-.16.504-.323.755-.491l.669-.447l-.147-.072l.851-.233l.144-3.336l-.492-.349c.262-.157.523-.317.785-.483l.639-.408M20.213 5.692c0-.444.006-.79.015-1.059c.153.12.331.251.521.386c.583 1.396 1.686 3.406 3.556 4.672c2.272 1.54 1.97-.23 3.182-1.846c1.212-1.615 2.032-2.461 4.062 1.693c.885 1.811 2.36-3.25 3.762-3.989c.371.202.741.39 1.104.55c2.514 4.088 3.679 2.813 5.912-.585c.614-.36 1.118-.746 1.519-1.055c.002.093.004.196.004.311c0 3.21-2.623 7.814-5.835 10.817a3.59 3.59 0 0 0-.642-1.053c-1.297-1.469-3.324.16-4.285 1.229c-1.705-.548-4.483-2.057-6.293-1.193a4.61 4.61 0 0 0-1.226.831c-2.96-2.698-5.356-6.593-5.356-9.709m16.204 10.974a26.467 26.467 0 0 1-1.337-.32c.558-.481 1.07-.649 1.285.066c.023.078.037.167.052.254m-7.6.621c-.331-.063-.671-.12-1.021-.165a14.18 14.18 0 0 1-.779-.525c.914-.613 2.49-.287 3.996.224c-.743.075-1.476.237-2.196.466m.454 2.64c-.56.14-1.17.084-1.697-.126c.214-.113.43-.211.646-.31c.35.169.7.31 1.051.436M10.774 56.379a39.327 39.327 0 0 1-6.912-2.733c1.357-.892 4.313-3.049 5.515-5.641c.824.647 2.726 1.827 6.43 2.733c-.063.102-.14.211-.214.318c-3.162-.828-4.96-1.875-4.989-1.893l-.436-.26l-.209.467c-.275.612-.92.704-1.279.704c-.1 0-.167-.007-.176-.008l-.357-.052l-.13.342c-.266.698-1.358 1.61-1.758 1.903l-.668.49l.764.313c.284.116.361.223.365.251c.01.069-.111.251-.24.356l-.582.469l.677.313c1.387.64 2.958 1.17 4.529 1.607c-.125.123-.233.228-.33.321m8.064-3.726c1.398.196 2.947.32 4.639.32h.001c.352 0 .709-.006 1.073-.017a.851.851 0 0 0 .103.213c.089.135.209.247.361.334l-2.552 2.181a3.216 3.216 0 0 0-.146-.003c-1.137 0-1.985.418-2.392 1.162a68.481 68.481 0 0 1-4.602-.747a51.413 51.413 0 0 0 3.515-3.443M7.489 53.85c.1-.189.165-.418.13-.668a1.016 1.016 0 0 0-.307-.59c.449-.385 1.068-.979 1.408-1.594c.773-.011 1.411-.304 1.813-.822c.677.354 2.202 1.069 4.455 1.689c-.921 1.155-2.162 2.465-3.127 3.439c-1.504-.398-3.019-.878-4.372-1.454m14.251 4.209l-.205.001c-.861 0-3.714-.07-7.483-.855c.132-.112.269-.227.396-.337c3.058.639 5.524.913 5.709.934l.366.039l.113-.355c.247-.766 1.158-.879 1.68-.879c.143 0 .238.009.249.01l.194.021l4.433-3.788l-1.185-.039c-.396-.014-.563-.103-.604-.164l.251-.657l-.694.029c-.506.022-1 .033-1.483.033h-.001c-1.396 0-2.691-.092-3.888-.237l.278-.328c2.416.323 5.309.522 8.802.497c-.834 1.17-2.914 3.657-6.928 6.075m10.024-4.345v1.825c-.569 0-1.123-.002-1.665-.006l-.163-2.054l-1.354.11c.912-1.078 1.301-1.797 1.336-1.862l.367-.694l-.775.014c-7.418.136-12.256-.748-15.31-1.73c-.223-.902-.352-1.922-.352-3.113c0-8.123 5.191-20.401 12.083-25.377c1.221 1.181 3.073 1.698 4.833.549c.386-.252.722-.582 1.037-.933c.075.002.152.019.228.019c.252 0 .508-.021.763-.053c.323.129.639.259.932.388c1.403.618 2.601.234 3.419-.618c6.313 3.82 11.371 13.925 12.702 22.093c-2.886 1.154-7.464 2.28-14.49 2.478c1.386-.792 2.426-2.124 2.052-3.874c-.393-1.85-1.939-2.37-3.54-2.455c-.004-.869-.004-1.736.002-2.605c.491.217.962.467 1.39.734c.756.475 1.44-.756.689-1.231a10.293 10.293 0 0 0-2.072-.999c.01-1.006.015-2.01.015-3.014c.001-.92-1.366-.92-1.366 0c0 .883-.006 1.765-.014 2.646a7.1 7.1 0 0 0-2.202-.037a26.48 26.48 0 0 0-.432-1.97c-.226-.886-1.546-.511-1.317.378c.168.639.305 1.275.418 1.92c-.058.022-.121.033-.178.059c-1.852.733-2.982 2.602-1.627 4.345c.631.812 1.456 1.14 2.359 1.249c.049 1.203.08 2.407.115 3.609c-.605-.393-1.156-.897-1.655-1.43c-.618-.652-1.583.355-.966 1.006c.839.893 1.72 1.568 2.675 2c.043 1.027.104 2.057.204 3.079c.088.907 1.456.912 1.367 0a53.716 53.716 0 0 1-.187-2.657c.52.09 1.066.113 1.646.058c.065.946.141 1.892.249 2.838c.062.542.58.755.962.645l-.085 1.964c-.602.054-1.216.104-1.856.146l-.762.05l.406.656c.041.066.502.795 1.531 1.856h-1.412zm24.888-6.582c-1.257.591-2.847 1.133-4.467 1.606c-.996-1.029-2.27-2.402-3.221-3.62c2.119-.642 3.305-1.304 3.84-1.661c.423.373.983.567 1.646.566c.22 0 .415-.021.565-.045c.48.622 1.254 1.34 1.738 1.769c-.229.235-.34.495-.331.776c.008.24.104.444.23.609m-7.155 3.286c.204.18.415.364.63.55c-4.054 1.075-7.071 1.192-7.728 1.203c-4.198-2.561-6.374-5.271-7.213-6.491c3.513-.088 6.417-.406 8.839-.844a24 24 0 0 0 .299.36a53.115 53.115 0 0 1-5.877.583l-.807.034l.444.679c-.001.001-.091.169-.687.285l-.969.189l4.764 3.857l.222-.06c.005-.001.425-.114.933-.114c.733 0 1.234.223 1.486.659l.16.276l.311-.055a87.25 87.25 0 0 0 5.193-1.111M35.4 47.479l-1.138-.062c-.053-.568-.106-1.136-.146-1.704c.2.332.61.956 1.284 1.766m-1.408-3.661a105.002 105.002 0 0 1-.119-4.041c.164.006.326.021.48.043c1.768.268 2.23 2.234.85 3.34c-.36.285-.775.494-1.211.658m10.439 6.752c-.448-.553-1.161-.843-2.083-.843c-.385 0-.724.052-.938.094l-2.995-2.427c.249-.143.417-.324.509-.546a.953.953 0 0 0 .052-.171c2.374-.13 4.374-.367 6.065-.657c.82.915 2.025 2.177 3.623 3.644c-1.963.467-3.6.787-4.233.906M32.505 39.813c.019 1.449.055 2.902.132 4.35c-.129.02-.256.045-.383.058c-.43.049-.838.013-1.226-.085c-.049-1.4-.081-2.803-.134-4.204c.538-.025 1.083-.078 1.611-.119m-1.68-1.265a44.292 44.292 0 0 0-.31-3.286a5.34 5.34 0 0 1 1.987.101a285.006 285.006 0 0 0-.005 3.067c-.439.024-.856.066-1.223.099a6.32 6.32 0 0 1-.449.019m-1.372-.175c-.085-.023-.169-.041-.256-.07a2.671 2.671 0 0 1-1.057-.667c-.854-.797.318-1.579 1.057-1.95c.116.89.196 1.788.256 2.687M40.49 57.839c-4.341-2.218-6.67-4.683-7.595-5.825c.665-.05 1.294-.11 1.917-.173l7.118 4.62l15.61-4.288c-8.05 4.852-16.003 5.591-17.05 5.666m12.892-7.89c-.128-.128-.281-.28-.462-.463c1.776-.538 3.494-1.162 4.775-1.848l.779-.419l-.79-.402c-.177-.091-.35-.258-.353-.321c.002-.024.072-.152.375-.326l.578-.332l-.514-.428c-.016-.013-1.619-1.344-2.182-2.201l-.186-.28l-.319.093c-.003 0-.277.079-.633.079c-.55.001-.962-.179-1.226-.533l-.292-.387l-.366.315c-.019.016-1.152.945-4.191 1.823a10.25 10.25 0 0 1-.289-.44c3.685-1.117 5.568-2.469 6.384-3.209c1.31 2.834 4.429 5.117 5.783 6.012a37.972 37.972 0 0 1-6.871 3.267"></path><path fill="currentColor" d="M44.38 47.117c-.997-.271-2.122-.086-2.516.409c-.391.497.103 1.123 1.099 1.396c.998.271 2.122.085 2.516-.411c.391-.497-.101-1.121-1.099-1.394"></path></svg>
                                            </span>         
                                        </div>
                                        <span class="symbol symbol-50px">
                                            <span class="px-3 py-1 fs-5 fw-bolder bg-warning text-white">{{$tax_count}}</span>
                                        </span>
                                    </div>
                                    Taxation
                                </a>
                                <a href="{{route('mutual_fund')}}" class="text-dark fw-bold fs-6 col border-bottom border-warning bg-light-warning p-6 rounded-2 me-7 mb-7">
                                                                   
                                    <div class="d-flex flex-stack flex-grow-1">
                                        <div class="d-flex flex-column me-2">
                                            <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" style="vertical-align: -0.125em;" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="currentColor" d="m4.406 14.523l3.402-3.402l2.828 2.829l3.157-3.157L12 9h5v5l-1.793-1.793l-4.571 4.571l-2.828-2.828l-2.475 2.474a8 8 0 1 0-.927-1.9zm-1.538 1.558l-.01-.01l.004-.004A9.965 9.965 0 0 1 2 12C2 6.477 6.477 2 12 2s10 4.477 10 10s-4.477 10-10 10c-4.07 0-7.57-2.43-9.132-5.919z"></path></svg>
                                            </span>         
                                        </div>
                                        <span class="symbol symbol-50px">
                                            <span class="px-3 py-1 fs-5 fw-bolder bg-warning text-white">{{$mutual_fund_count}}</span>
                                        </span>
                                    </div>
                                    Mutual Fund
                                </a>
                                <a href="{{route('insurance')}}" class="text-dark fw-bold fs-6 col border-bottom border-warning bg-light-warning p-6 rounded-2 me-7 mb-7">                            
                                    <div class="d-flex flex-stack flex-grow-1">
                                        <div class="d-flex flex-column me-2">       
                                            <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" style="vertical-align: -0.125em;" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 1024 1024"><path fill="currentColor" d="M128 384h768v-64a64 64 0 0 0-64-64H192a64 64 0 0 0-64 64v64zm0 64v320a64 64 0 0 0 64 64h640a64 64 0 0 0 64-64V448H128zm64-256h640a128 128 0 0 1 128 128v448a128 128 0 0 1-128 128H192A128 128 0 0 1 64 768V320a128 128 0 0 1 128-128z"></path><path fill="currentColor" d="M384 128v64h256v-64H384zm0-64h256a64 64 0 0 1 64 64v64a64 64 0 0 1-64 64H384a64 64 0 0 1-64-64v-64a64 64 0 0 1 64-64z"></path></svg>
                                            </span>         
                                        </div>
                                        <span class="symbol symbol-50px">
                                            <span class="px-3 py-1 fs-5 fw-bolder bg-warning text-white">{{$insurance_count->count()}}</span>
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
            <input type="hidden" name="base_url" id="base_url" value="{{url('loan')}}">
            <!--begin::Row-->
            <div class="row gy-5 g-xl-8 mt-xl-5">
                <!--begin::Col-->
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-12 ">
                    <!--begin::Tables Widget 9-->
                    <div class="card card-xl-stretch mb-5 mb-xl-8">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder text-dark">Loan Management</span>
                                <!-- <span class="text-gray-400 mt-1 fw-bold fs-6">Avg. 10 customers added per day</span> -->
                            </h3>
                            <!--begin::Actions-->
                            <div class="card-toolbar">
                                <!--begin::Filters-->
                                <div class="d-flex flex-stack flex-wrap gap-4">
                                    <!--begin::Destination-->
                                    <!--end::Destination-->
                                    <!--begin::Status-->
                                    <div class="d-flex align-items-center fw-bolder">

                                        <!--begin::Label-->
                                        <input type="hidden" name="loan_status_url" id="loan_status_url" value="{{url('loan_status')}}">
                                        <div class="text-muted fs-7 me-2">Status</div>
                                        <!--end::Label-->
                                        @if($loan_status != NULL)
                                            <!--begin::Select-->
                                            <select class="form-select form-select-transparent text-dark fs-7 lh-1 fw-bolder py-0 ps-3 w-auto" data-control="select2" data-hide-search="true" data-dropdown-css-class="w-150px" data-placeholder="Show All" data-kt-table-widget-4="filter_status" name="loan_status" id="loan_status" >
                                                <option></option>
                                                <option value="null" selected="selected">Show All</option>
                                                <option value="2" {{ ("2" == $loan_status ) ? "selected":"" }}>Pending</option>
                                                <option value="1" {{ ("1" == $loan_status ) ? "selected":"" }}>Approved</option>
                                                <option value="0" {{ ("0" == $loan_status ) ? "selected":"" }}>Rejected</option>
                                            </select>
                                            <!--end::Select-->
                                        @else
                                            <!--begin::Select-->
                                            <select class="form-select form-select-transparent text-dark fs-7 lh-1 fw-bolder py-0 ps-3 w-auto" data-control="select2" data-hide-search="true" data-dropdown-css-class="w-150px" data-placeholder="Show All" data-kt-table-widget-4="filter_status" name="loan_status" id="loan_status" >
                                                <option></option>
                                                <option value="null" selected="selected">Show All</option>
                                                <option value="1">Approved</option>
                                                <option value="0">Rejected</option>
                                                <option value="2">Pending</option>
                                            </select>
                                            <!--end::Select-->
                                        @endif
                                    </div>
                                    <!--end::Status-->
                                    <input type="hidden" name="loan_search_url" id="loan_search_url" value="{{url('loan_search')}}">

                                    @if($loan_search != NULL)
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
                                            <input type="text" data-kt-table-widget-4="search" class="form-control w-150px fs-7 ps-12" placeholder="Search" name="loan_search" value="{{$loan_search}}" />
                                        </div>
                                        <!--end::Search-->
                                    @else
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
                                            <input type="text" data-kt-table-widget-4="search" class="form-control w-150px fs-7 ps-12" placeholder="Search" name="loan_search" />
                                        </div>
                                        <!--end::Search-->
                                    @endif
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
                                            <th class="">AMOUNT</th>
                                            <!-- <th class="">INTREST</th> -->
                                            <th class="">STATUS</th>
                                            <th class="">ACTIONS</th>
                                        </tr>
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody class="user_table">
                                       @foreach($loans as $loan)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="symbol symbol-45px me-5">
                                                        @php
                                                            $avatar = App\Models\UserDetail::where('user_id',$loan->user->id)->first();
                                                        @endphp
                                                        @if($avatar != NULL)
                                                        <img src="{{ $avatar->avatar}}" alt="" />
                                                        @endif
                                                    </div>
                                                    <div class="d-flex justify-content-start flex-column">
                                                        <a href="{{route('user', ['id' => $loan->user->id,'flag' => 'loan'])}}" class="text-dark fw-bolder text-hover-primary fs-6">{{$loan->user->first_name}} {{$loan->user->last_name}}</a>
                                                        <span class="text-muted fw-bold text-muted d-block fs-7">#{{$loan->user->id}}</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>Rs {{$loan->commafun($loan->amount)}}</td>
                                            <!-- <td>
                                                @if($loan->intrest != NULL)
                                                {{$loan->intrest}}
                                                @else
                                                -
                                                @endif
                                            </td> -->
                                            @if($loan->is_close == 1)
                                                <td><span class="badge py-3 px-4 fs-7 badge-secondary">Closed</span></td>
                                            @else
                                                @php
                                                    $payment = App\Models\LoanPayment::where([['loan_id',$loan->id],['is_status',2]])->first();
                                                @endphp
                                                @if($loan->is_status == 2 || $payment != NULL)
                                                    <td><span class="badge py-3 px-4 fs-7 badge-light-warning">Pending</span></td>
                                                @elseif($loan->is_status == 1)
                                                    <td><span class="badge py-3 px-4 fs-7 badge-light-success">Accepted</span></td>
                                                @elseif($loan->is_status == 0)
                                                    <td><span class="badge py-3 px-4 fs-7 badge-light-danger">Rejected</span></td>
                                                @endif
                                            @endif
                                            <td class="">
                                                <button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary"name="loan_edit" data-system_id="{{$loan->id}}" title="Edit"><i class="fas fa-pencil-alt" id="fa"></i></button>
                                                
                                                <a class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" href="{{route('view_loan', ['id' => $loan->id])}}">
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
                                    {{ $loans->links() }}
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
            <div id="admin_loan" id="admin_loan">
                @if($admin_loan_count != 0)
                    <div class="row gy-5 g-xl-8 mt-xl-5" >
                        <div class="col-xl-12 mb-5 mb-xl-10">
                            <!--begin::Table Widget 4-->
                            <div class="card card-flush h-xl-100">
                                <!--begin::Card header-->
                                <div class="card-header pt-7">
                                    <!--begin::Title-->
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label fw-bolder text-dark">My Loans</span>

                                    </h3>
                                    <!--end::Title-->
                                    <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="Next Loan">
                                        <a class="btn btn-sm btn-light btn-active-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_start_loan" >
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                            <span class="svg-icon svg-icon-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
                                                    <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->Next Loan 
                                        </a>
                                    </div>
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body">
                                    <!--begin::Table container-->
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                            <!--begin::Table head-->
                                            <thead>
                                                <tr class="fw-bolder text-muted">
                                                    <th class="">USER</th>
                                                    <th class="">AMOUNT</th>
                                                    <th class="">INTREST</th>
                                                    <th class="">STATUS</th>
                                                    <th class="">ACTIONS</th>
                                                </tr>
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->
                                            <tbody class="user_table">
                                               @foreach($admin_loans as $admin_loan)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="symbol symbol-45px me-5">
                                                                @php
                                                                    $avatar = App\Models\UserDetail::where('user_id',$admin_loan->user->id)->first();
                                                                @endphp
                                                                @if($avatar != NULL)
                                                                <img src="{{ $avatar->avatar}}" alt="" />
                                                                @endif
                                                            </div>
                                                            <div class="d-flex justify-content-start flex-column">
                                                                <a href="{{route('user', ['id' => $admin_loan->user->id,'flag' => 'loan'])}}" class="text-dark fw-bolder text-hover-primary fs-6">{{$admin_loan->user->first_name}} {{$admin_loan->user->last_name}}</a>
                                                                <span class="text-muted fw-bold text-muted d-block fs-7">#{{$admin_loan->user->id}}</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>Rs {{$admin_loan->commafun($admin_loan->amount)}}</td>
                                                    <td>
                                                        @if($admin_loan->intrest != NULL)
                                                        {{$admin_loan->intrest}}
                                                        @else
                                                        -
                                                        @endif
                                                    </td>
                                                    @if($admin_loan->is_close == 1)
                                                        <td><span class="badge py-3 px-4 fs-7 badge-light-secondary">Expired</span></td>
                                                    @else
                                                        @if($admin_loan->is_status == 2)
                                                            <td><span class="badge py-3 px-4 fs-7 badge-light-warning">Pending</span></td>
                                                        @elseif($admin_loan->is_status == 1)
                                                            <td><span class="badge py-3 px-4 fs-7 badge-light-success">Accepted</span></td>
                                                        @elseif($admin_loan->is_status == 0)
                                                            <td><span class="badge py-3 px-4 fs-7 badge-light-danger">Rejected</span></td>
                                                        @endif
                                                    @endif
                                                    <td class="">
                                                        <button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary"name="loan_edit" data-system_id="{{$admin_loan->id}}" title="Edit"><i class="fas fa-pencil-alt" id="fa"></i></button>
                                                        
                                                        <a class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" href="{{route('view_loan', ['id' => $admin_loan->id])}}">
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
                                    <!--end::Table container-->
                                    <div class="d-flex justify-content-end mb-3">
                                        {{ $admin_loans->links() }}
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
                                        <h2 class="fs-2x fw-bolder mb-0">Get Your Loan Here </h2>
                                        <!--end::Title-->
                                        <!--begin::Description-->
                                        <p class="text-gray-400 fs-4 fw-bold py-7">Click on the below button to get your loan </p>
                                        <!--end::Description-->
                                        <!--begin::Action-->
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_start_loan" style="color: white;">Start Loan</button>
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
            <!--end::Row-->
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

<!-- begin::Modal -loan- -->
<div class="modal fade" id="kt_modal_start_loan" tabindex="-1" aria-hidden="true">
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
                    <div class="fs-4 fw-bolder mb-2">Loan</div>
                    <!--end::Heading-->
                    <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" method="post" action="{{route('save_loan')}}" enctype="multipart/form-data">
                        @csrf

                        <!--begin::Input group-->
                        <div class="fv-row mb-8">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                <span class="required">Loan Amount</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Loan Amount"></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="number" class="form-control form-control-solid @error('amount') is-invalid @enderror" placeholder="Loan Amount" value="{{old('amount')}}" name="amount" id="amount" required="true" />
                            <!--end::Input-->
                            @error('amount')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-8">
                            <!--begin::Label-->
                            <label class="required fs-6 fw-bold mb-2">Property Type</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid @error('property_type') is-invalid @enderror" placeholder="Land/Gold/Etc.." value="{{old('property_type')}}" name="property_type" id="property_type" required="true" />
                            <!--end::Input-->
                            @error('property_type')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-8">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                <span class="">Property Value</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Property Value"></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid @error('property_value') is-invalid @enderror" placeholder="Property Value" value="{{old('property_value')}}" name="property_value" id="property_value" required="true"/>
                            @error('property_value')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-8">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                <span class="">Property Copy(*You can choose and upload multiple documents at a same time)</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Property Copy"></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="file" class="form-control form-control-solid custom-file-input @error('property_copy') is-invalid @enderror" id="property_copy" placeholder="Property Copy" value="" name="property_copy[]" required="true" multiple />
                            @error('property_copy')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <!--end::Input-->
                            <!-- <div class="d-flex justify-content-center mt-3">
                                <img id="preview-image-property" style="max-height: 200px;">
                                <a href="#" class="text-hover-primary" onclick="delete_property()"  style="display:none;" id="property_image">X</a>
                            </div> -->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <label class="form-check form-check-custom form-check-solid form-check-inline">
                                <input class="form-check-input @error('terms_and_conditions') is-invalid @enderror" type="checkbox" name="terms_and_conditions" id="terms_and_conditions" required="true" />
                                <span class="form-check-label fw-bold text-gray-700 fs-6">I Agree
                                    <a href="{{route('loan_terms_and_condition')}}" target="_blank" class="ms-1 text-hover-primary">Terms and conditions</a>.
                                </span>
                            </label>
                            @error('terms_and_conditions')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!--end::Input group-->
                        
                        <div class="d-flex justify-content-center" >
                            <button type="submit" class="btn  btn-primary mt-5 mb-3">Submit</button> 
                        </div>
                    </form>
                </div>
                <!--end::Users-->
            </div>
            <!--end::Modal body-->
        </div>
            <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!-- end::Modal -loan- -->

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
<!--end::Modal - Create Profile-->


<!-- begin::loan edit Modal -->
<div class="modal fade" id="edit_loan_modal" tabindex="-1" aria-hidden="true">
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
                    <div class="fs-6 fw-bold mb-2">Loan Approval</div>
                    <!--end::Heading-->
                    <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" method="post" action="{{route('loan_edit')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="loan_id" id="loan_id">

                        <table class="text-center table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                            <thead>
                                <tr class="fw-bolder text-muted">
                                    <th class="">DOCUMENTS</th>
                                    <th class="">ACTION</th>
                                </tr>
                            </thead>
                            <tbody class="loan_body">
                            </tbody>
                        </table>
                        
                        <!--begin::List-->
                        <div class="mh-300px scroll-y me-n7 pe-7">
                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    
                                    <!--begin::Details-->
                                    <div class="ms-5">
                                        <span class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Loan Amount</span>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->
                                <!--begin::Access menu-->
                                <div class="ms-2 w-150px">
                                    <input type="text" class="form-control form-control-solid" placeholder="Loan Amount" value="" name="loan_amount" id="loan_amount" readonly="" />
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
                                        <span class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Property Type</span>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->
                                <!--begin::Access menu-->
                                <div class="ms-2 w-150px">
                                    <input type="text" class="form-control form-control-solid" placeholder="Property Type" value="" name="loan_property_type" id="loan_property_type" readonly="" />
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
                                        <span class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Property Value</span>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->
                                <!--begin::Access menu-->
                                <div class="ms-2 w-150px">
                                    <input type="text" class="form-control form-control-solid" placeholder="Property Value" value="" name="loan_property_value" id="loan_property_value" readonly="" />
                                </div>
                                <!--end::Access menu-->
                            </div>
                        </div>
                        <!--end::List-->

                        <!--begin::List-->
                        <!-- <div class="mh-300px scroll-y me-n7 pe-7">
                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <div class="d-flex align-items-center">
                                    <div class="ms-5">
                                        <span class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Intrest</span>
                                    </div>
                                </div>
                                <div class="ms-2 w-150px">
                                    <input type="number" class="form-control form-control-solid @error('loan_intrest') is-invalid @enderror" placeholder="Intrest" value="" name="loan_intrest" id="loan_intrest" required="" />
                                    @error('loan_intrest')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div> -->
                        <!--end::List-->

                        <!--begin::List-->
                        <div class="mh-300px scroll-y me-n7 pe-7">
                            <div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    
                                    <!--begin::Details-->
                                    <div class="ms-5">
                                        <span class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Requested Date</span>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->
                                <!--begin::Access menu-->
                                <div class="ms-2 w-150px">
                                    <input type="date" class="form-control form-control-solid " placeholder="Requested Date" value="" name="loan_requested_date" id="loan_requested_date" />
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
                                        <span class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Accepted Date</span>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->
                                <!--begin::Access menu-->
                                <div class="ms-2 w-150px">
                                    <input type="date" class="form-control form-control-solid" placeholder="Accepted Date" value="" name="loan_approved_date" id="loan_approved_date" required="" />
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
                                    <select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true" name="is_status" id="is_status">
                                        <option value="">Select</option>
                                    </select>
                                </div>
                                <!--end::Access menu-->
                            </div>
                        </div>
                        <!--end::List-->

                        <!--begin::Input group-->
                        <div class="fv-row mt-5 mb-8">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                <span class="">Payment Copy(*You can choose and upload multiple documents at a same time)</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Property Copy"></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="file" class="form-control form-control-solid custom-file-input" id="approve_payment_copy" placeholder="Payment Copy" value="" name="approve_payment_copy[]" required="true" multiple />
                            <!--end::Input-->
        
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




<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

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
        // var email = document.getElementById("email").value;
        // if(email){
        //     format = /^[a-zA-Z0-9\._-]+@[a-zA-Z0-9-]{2,}[.][a-zA-Z]{2,4}$/;
        //     if(!format.test(email))
        //     {
        //         alertText = alertText+"<br>Email should be in format example@domain.com";
        //     } 
        // }
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
        // if (!document.getElementById("ifsc_code").value) {
        //     alertText = alertText+"<br>IFSC code is required";
        // }
        // var ifsc_code = document.getElementById("ifsc_code").value;
        // if(ifsc_code){
        //     format = /^[A-Z]{4}0[0-9]{6}$/;
        //     if(!format.test(ifsc_code))
        //     {
        //         alertText = alertText+"<br>IFSC code is not valid";
        //     } 
        // }
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

<!-- Loan Edit -->
<script type="text/javascript">

    $(document).on('click', 'button[name^="loan_edit"]', function(e) {
        var system_id = $(this).data("system_id");
        console.log(system_id);

        if(system_id)
        {
            jQuery.ajax({
                url : 'get_loan',
                type: 'GET',
                dataType: 'json',
                data: { id: system_id },
                success:function(data)
                { 
                    console.log(data);
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
                    jQuery('#edit_loan_modal').modal('show');
                    document.getElementById("loan_id").value = data.id;
                    document.getElementById("loan_amount").value = data.amount;
                    document.getElementById("loan_property_type").value = data.property_type;
                    document.getElementById("loan_property_value").value = data.property_value;
                    if(data.is_status == 1)
                    {
                        jQuery('select[name="is_status"]').empty();
                        $('select[name="is_status"]').append('<option value="'+ '1' +'" selected>'+ 'Approved' +'</option>');
                        $('select[name="is_status"]').append('<option value="'+ '0' +'">'+ 'Rejected' +'</option>');
                        $('select[name="is_status"]').append('<option value="'+ '2' +'">'+ 'Pending' +'</option>');
                    }
                    else if(data.is_status == 0){

                        jQuery('select[name="is_status"]').empty();
                        $('select[name="is_status"]').append('<option value="'+ '1' +'">'+ 'Approved' +'</option>');
                        $('select[name="is_status"]').append('<option value="'+ '0' +'" selected>'+ 'Rejected' +'</option>');
                        $('select[name="is_status"]').append('<option value="'+ '2' +'">'+ 'Pending' +'</option>');
                    }
                    else if(data.is_status == 2){

                        jQuery('select[name="is_status"]').empty();
                        $('select[name="is_status"]').append('<option value="'+ '1' +'">'+ 'Approved' +'</option>');
                        $('select[name="is_status"]').append('<option value="'+ '0' +'">'+ 'Rejected' +'</option>');
                        $('select[name="is_status"]').append('<option value="'+ '2' +'" selected>'+ 'Pending' +'</option>');
                    }
                    document.getElementById("loan_requested_date").value = data.requested_on;
                    if(data.approved_on !== null){
                        document.getElementById("loan_approved_date").value = data.approved_on;
                    }
                    else{
                        document.getElementById("loan_approved_date").value = today;

                    }
                    var output = '';
                    for(var count = 0; count < data.property_copy.length; count++)
                    {
                        var url = data.property_copy[count];
                        var no = count+1;
                        output += '<tr>';
                        output += '<td>Document '+no+'</td>';
                        output += '<td><div class="pa-inline-buttons"><a href="'+url+'" target="_blank" class=""><button type="button" class="btn btn-warning">View</button>   </a><a href="'+url+'" download class=""><button type="button" class="btn btn-success">Download</button></a></div></td>';
                        output += '</tr>';
                    }
                    $('.loan_body').html(output);

                }
            });
        }
        
    });

</script>

<!-- loan status search -->
<script type="application/javascript">
    jQuery(document).ready(function ()
    {
        jQuery('select[name="loan_status"]').on('change',function(){
            var loan_status = jQuery(this).val();
            var status_url = jQuery("#loan_status_url").val();
            var url = status_url+"/"+loan_status+'/';
            if(loan_status == 'null'){
                url = jQuery("#base_url").val();
            }
            window.location = url; 
        });
    });
</script>

<!-- loan search -->
<script type="application/javascript">
    jQuery(document).ready(function ()
    {
        jQuery('input[name="loan_search"]').on('change',function(){
            var loan_search = jQuery(this).val();
            var search_url = jQuery("#loan_search_url").val();
            var url = search_url+"/"+loan_search+'/';
            if(loan_search == ''){
                url = jQuery("#base_url").val();
            }
            window.location = url; 
        });
    });
</script>

<!-- loan terms and condition check -->
<script type="text/javascript">

    $('#terms_and_conditions').change(function () {
        if (this.checked) {
            document.getElementById('loan_final').style.display = 'block';
        }
        else{
            document.getElementById('loan_final').style.display = 'none';
        }
    });
</script>
<!-- loan terms and condition check end -->


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

@endsection

@section('scripts')

@endsection