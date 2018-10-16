


<form action="{{ route('inspection.store') }}" method="post">
@csrf

    <fieldset class="form-group">
        <div class="row">
            <legend class="col-form-label col-sm-2 pt-0"><strong><font color="blue">Factory --> {{$factory_name_send_back}} </font></strong></legend>
            <div class="col-sm-10">
                <div class="form-check custom-control-inline">
                    <input class="form-check-input" type="radio" name="factory_name" id="factory_name1" value="Bangpla" {{ $factory_name_send_back === "Bangpla" ? "selected" : "" }} required>
                    <label class="form-check-label" for="gridRadios1">
                        Bangpla
                    </label>
                </div>
                <div class="form-check custom-control-inline">
                    <input class="form-check-input" type="radio" name="factory_name" id="factory_name" value="Surat" {{ $factory_name_send_back === "Surat" ? "selected" : "" }} >
                    <label class="form-check-label" for="gridRadios1">
                        Surat
                    </label>
                </div>
            </div>

        </div>

    </fieldset>
    @if ($errors->has('factory_name'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('factory_name') }}</strong>
    </div>
    @endif


    <fieldset class="form-group">
        <div class="row">
            <legend class="col-form-label col-sm-2 pt-0"><strong><font color="blue">Size</font></strong></legend>
            <div class="col-sm-10">
                <div class="form-check  custom-control-inline">
                    <input class="form-check-input" type="radio" name="size" id="size1"  value="4" required>
                    <label class="form-check-label" for="gridRadios1">
                        4 Kgs
                    </label>
                </div>
                <div class="form-check  custom-control-inline">
                    <input class="form-check-input" type="radio" name="size" id="size2" value="7" >
                    <label class="form-check-label" for="gridRadios1">
                        7 Kgs
                    </label>
                </div>
                <div class="form-check  custom-control-inline">
                    <input class="form-check-input" type="radio" name="size" id="size3" selected value="15" >
                    <label class="form-check-label" for="gridRadios1">
                        15 Kgs
                    </label>
                </div>
                <div class="form-check  custom-control-inline">
                    <input class="form-check-input" type="radio" name="size" id="size4" value="48" >
                    <label class="form-check-label" for="gridRadios1">
                        48 Kgs
                    </label>
                </div>
            </div>

        </div>

    </fieldset>
    @if ($errors->has('size'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('size') }}</strong>
    </div>
    @endif

    <div class="form-group row">
        <div class="col-sm-2">
            <label for="retest_date" class=" col-form-label"><strong><font color="blue">Retest Date</font></strong></label>
        </div>
        <div class="col-sm-10">
            <input type="text" name="retest_date" value="" id="retest_date" class="form-control {{ $errors->has('retest_date') ? 'is-invalid' : '' }}" required>
            @if ($errors->has('retest_date'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('retest_date') }}</strong>
            </div>
            @endif
            <div class="invalid-feedback">
                <strong>ABC</strong>
            </div>
        </div>
    </div>

    ABCDEF

    <fieldset class="form-group">
        <div class="row">
            <legend class="col-form-label col-sm-2 pt-0"><strong><font color="blue">Manufaturer Name</font></strong></legend>
            <div class="col-sm-10">
                <div class="form-check custom-control-inline">
                    <input class="form-check-input" type="radio" name="manufacturer_name" id="manufacturer_name1" value="MTM" required >
                    <label class="form-check-label" for="gridRadios1">
                        MTM
                    </label>
                </div>
                <div class="form-check custom-control-inline">
                    <input class="form-check-input" type="radio" name="manufacturer_name" id="manufacturer_name2" value="LIHN" >
                    <label class="form-check-label" for="gridRadios1">
                        LIHN
                    </label>
                </div>
                <div class="form-check custom-control-inline">
                    <input class="form-check-input" type="radio" name="manufacturer_name" id="manufacturer_name3" value="SMPC" >
                    <label class="form-check-label" for="gridRadios1">
                        SMPC
                    </label>
                </div>
                <div class="form-check custom-control-inline">
                    <input class="form-check-input" type="radio" name="manufacturer_name" id="manufacturer_name4" value="Hackey" >
                    <label class="form-check-label" for="gridRadios1">
                        Hackey
                    </label>
                </div>
                <div class="form-check custom-control-inline">
                    <input class="form-check-input" type="radio" name="manufacturer_name" id="manufacturer_name5" value="PCI" >
                    <label class="form-check-label" for="gridRadios1">
                        PCI
                    </label>
                </div>
            </div>

        </div>

    </fieldset>
    @if ($errors->has('manufacturer_name'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('manufacturer_name') }}</strong>
    </div>
    @endif

    <div class="form-group row">
        <label for="serial_number" class="col-sm-2 col-form-label"><strong><font color="blue">SERIAL NUMBER</font></strong></label>
        <div class="col-sm-10">
            <input type="text" name="serial_number" value="" id="serial_number" class="form-control serialmask {{ $errors->has('serial_number') ? 'is-invalid' : '' }}" required>
        </div>
    </div>
    @if ($errors->has('serial_number'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('serial_number') }}</strong>
    </div>
    @endif


    <div class="form-group row">
        <label for="manu_month_year" class="col-sm-2 col-form-label"><strong><font color="blue">Manufacturing Date</font></strong></label>
        <div class="col-sm-10">
            <input type="text" name="manu_month_year" value="" id="manu_month_year" class="form-control manu_month_year {{ $errors->has('manu_month_year') ? 'is-invalid' : '' }}" required>
        </div>
    </div>
    @if ($errors->has('manu_month_year'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('manu_month_year') }}</strong>
    </div>
    @endif

    <fieldset class="form-group">
        <div class="row">
            <legend class="col-form-label col-sm-2 pt-0"><strong><font color="blue">Test Type</font></strong></legend>
            <div class="col-sm-10">
                <div class="form-check custom-control-inline">
                    <input class="form-check-input" type="radio" name="hydro_or_expand" id="hydro_radio" value="hydro" required>
                    <label class="form-check-label" for="gridRadios1">
                        Hydro
                    </label>
                </div>
                <div class="form-check custom-control-inline">
                    <input class="form-check-input" type="radio" name="hydro_or_expand" id="expand_radio" value="expand" >
                    <label class="form-check-label" for="gridRadios1">
                        Expand
                    </label>
                </div>
            </div>

        </div>

    </fieldset>
    @if ($errors->has('pass_or_not'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('pass_or_not') }}</strong>
    </div>
    @endif

    <div id="expand_div">
        <div class="form-group row">
            <label for="volumn1" class="col-sm-2 col-form-label"><strong><font color="green">V1</font></strong></label>
            <div class="col-sm-10">
                <input type="text" name="volumn1" value="" id="volumn1" class="form-control numeric_number {{ $errors->has('volumn1') ? 'is-invalid' : '' }}">
            </div>
        </div>
        @if ($errors->has('volumn1'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('volumn1') }}</strong>
        </div>
        @endif

        <div class="form-group row">
            <label for="volumn2" class="col-sm-2 col-form-label"><strong><font color="green">V2</font></strong></label>
            <div class="col-sm-10">
                <input type="text" name="volumn2" value="" id="volumn2" class="form-control numeric_number {{ $errors->has('volumn2') ? 'is-invalid' : '' }}">
            </div>
        </div>
        @if ($errors->has('volumn2'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('volumn2') }}</strong>
        </div>
        @endif
    </div>

    <fieldset class="form-group">
        <div class="row">
            <legend class="col-form-label col-sm-2 pt-0"><strong><font color="blue">Result</font></strong></legend>
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="pass_or_not" id="pass_or_not1" value="pass" required>
                    <label class="form-check-label" for="gridRadios1">
                        Pass
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="pass_or_not" id="pass_or_not2" value="not_pass" >
                    <label class="form-check-label" for="gridRadios1">
                        Not Pass
                    </label>
                </div>
            </div>

        </div>

    </fieldset>
    @if ($errors->has('pass_or_not'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('pass_or_not') }}</strong>
    </div>
    @endif

    <div class="form-group ">
        <button type="submit" class="btn btn-outline-primary btn-lg">{{ $buttonText }}</button>
    </div>
</form>



