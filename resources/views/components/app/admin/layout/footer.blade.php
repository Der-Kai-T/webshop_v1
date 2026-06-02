<footer {{ $attributes->class(['app-footer']) }}> <!--begin::To the end-->
    <div class="float-end d-none d-sm-inline" style="font-size: .8rem">
        Version 1.0.0
        <small style="font-size: .6rem">Build: XXX</small>

    </div> <!--end::To the end--> <!--begin::Copyright-->
    <div>
        @php($year = \Carbon\Carbon::now()->format("Y"))

    </div>

    <!--end::Copyright-->
</footer> <!--end::Footer-->
