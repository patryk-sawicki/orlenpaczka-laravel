<div style="background-color: #fff8ef;">
    <div class="">
        <h2><a data-toggle="collapse" href="#orlenPaczka" role="button" aria-expanded="false"
               aria-controls="orlenPaczka"><img
                        src="{!! route('op.img', ['op_logo', 'png']) !!}" alt="Orlen Paczka"
                        width="50"> <small>(Kliknij aby wyświetlić)</small></a></h2>
    </div>

    <div class="collapse" id="orlenPaczka">
        <form action="{{ route('op.generateLabelBusinessPack', ['disc' => $disc ?? 'public', 'dir' => $dir ?? 'labels', 'file' => $file ?? 'label']) }}"
              method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="row">
                {{--Destination Code--}}
                <div class="col-xs-3 col-sm-2 col-md-2 col-lg-2 mb-10-px">
                    <label for="op-destination_code">Punkt Odbioru</label>
                    <input type="text" name="op[DestinationCode]"
                           id="op-destination_code" placeholder="Punkt Odbioru"
                           value="{{ $destinationCode ?? '' }}"
                           class="form-control"
                           maxlength="15"
                    >
                </div>

                {{--Box Size--}}
                <div class="col-xs-3 col-sm-2 col-md-2 col-lg-2 mb-10-px">
                    <label for="op-box_size">Rozmiar</label>
                    <select name="op[BoxSize]" id="op-box_size" class="form-control js-required" required>
                        <option value="">--Wybierz--</option>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                    </select>
                </div>
            </div>

            <h2>Odbiorca</h2>

            <div class="row">
                {{--First Name--}}
                <div class="col-xs-3 col-sm-2 col-md-2 col-lg-2 mb-10-px">
                    <label for="op-first_name">Imię</label>
                    <input type="text" name="op[FirstName]" id="op-first_name" placeholder="Imię"
                           value="{{ $firstName ?? '' }}" class="form-control js-required" required
                           maxlength="30">
                </div>

                {{--Last Name--}}
                <div class="col-xs-3 col-sm-2 col-md-2 col-lg-2 mb-10-px">
                    <label for="op-last_name">Nazwisko</label>
                    <input type="text" name="op[LastName]" id="op-last_name" placeholder="Nazwisko"
                           value="{{ $lastName ?? '' }}" class="form-control js-required" required
                           maxlength="30">
                </div>

                {{--Phone Number--}}
                <div class="col-xs-3 col-sm-2 col-md-2 col-lg-2 mb-10-px">
                    <label for="op-phone_number">Telefon</label>
                    <input type="tel" name="op[PhoneNumber]" id="op-phone_number" placeholder="Telefon"
                           value="{{ $phoneNumber ?? '' }}" class="form-control js-required" required maxlength="9">
                </div>
            </div>

            <h2>Nadawca</h2>

            <div class="row">
                {{--Sender First Name--}}
                <div class="col-xs-3 col-sm-2 col-md-2 col-lg-2 mb-10-px">
                    <label for="op-sender_first_name">Imię</label>
                    <input type="text" name="op[SenderFirstName]" id="op-sender_first_name" placeholder="Imię"
                           value="{{ $senderFirstName ?? '' }}" class="form-control js-required" required
                           maxlength="30">
                </div>

                {{--Sender Last Name--}}
                <div class="col-xs-3 col-sm-2 col-md-2 col-lg-2 mb-10-px">
                    <label for="op-sender_last_name">Nazwisko</label>
                    <input type="text" name="op[SenderLastName]" id="op-sender_last_name" placeholder="Nazwisko"
                           value="{{ $senderLastName ?? '' }}" class="form-control js-required" required
                           maxlength="30">
                </div>

                {{--Sender E-mail--}}
                <div class="col-xs-3 col-sm-2 col-md-2 col-lg-2 mb-10-px">
                    <label for="op-sender_email">E-mail</label>
                    <input type="email" name="op[SenderEMail]" id="op-sender_email" placeholder="E-mail"
                           value="{{ $senderEMail ?? '' }}" class="form-control js-required" required maxlength="60">
                </div>

                {{--Sender Street Name--}}
                <div class="col-xs-3 col-sm-2 col-md-2 col-lg-2 mb-10-px">
                    <label for="op-sender_street_name">Ulica</label>
                    <input type="text" name="op[SenderStreetName]" id="op-sender_street_name" placeholder="Ulica"
                           value="{{ $senderStreetName ?? '' }}"
                           class="form-control js-required" required maxlength="30">
                </div>

                {{--Sender Building Number--}}
                <div class="col-xs-3 col-sm-2 col-md-2 col-lg-2 mb-10-px">
                    <label for="op-sender_building_number">Numer</label>
                    <input type="text" name="op[SenderBuildingNumber]" id="op-sender_building_number"
                           placeholder="Numer"
                           value="{{ $senderBuildingNumber ?? '' }}"
                           class="form-control js-required" required maxlength="10">
                </div>

                {{--Sender City--}}
                <div class="col-xs-3 col-sm-2 col-md-2 col-lg-2 mb-10-px">
                    <label for="op-sender_city">Miasto</label>
                    <input type="text" name="op[SenderCity]" id="op-sender_city"
                           placeholder="Miasto"
                           value="{{ $senderCity ?? '' }}"
                           class="form-control js-required" required maxlength="30">
                </div>

                {{--Sender Post Code--}}
                <div class="col-xs-3 col-sm-2 col-md-2 col-lg-2 mb-10-px">
                    <label for="op-sender_post_code">Kod pocztowy</label>
                    <input type="text" name="op[SenderPostCode]" id="op-sender_post_code"
                           placeholder="Kod pocztowy"
                           value="{{ $senderPostCode ?? '' }}"
                           class="form-control js-required" required maxlength="6">
                </div>

                {{--Sender Phone Number--}}
                <div class="col-xs-3 col-sm-2 col-md-2 col-lg-2 mb-10-px">
                    <label for="op-sender_phone_number">Telefon</label>
                    <input type="tel" name="op[SenderPhoneNumber]" id="op-sender_phone_number" placeholder="Telefon"
                           value="{{ $senderPhoneNumber ?? '' }}" class="form-control js-required" required
                           maxlength="9">
                </div>
            </div>

            <h2>Przesyłka</h2>

            <div class="row">
                {{--Print Adress--}}
                <div class="col-xs-3 col-sm-2 col-md-2 col-lg-2 mb-10-px">
                    <label for="op-print_adress">Adres do wydruku przy zwrocie</label>
                    <select name="op[PrintAdress]" id="op-print_adress" class="form-control js-required" required>
                        <option value="">--Wybierz--</option>
                        <option value="1" selected>Adres nadania</option>
                        <option value="2">Adres zwrotu</option>
                    </select>
                </div>

                {{--Print Type--}}
                <div class="col-xs-3 col-sm-2 col-md-2 col-lg-2 mb-10-px">
                    <label for="op-print_type">Wybór etykiety do wydruku</label>
                    <select name="op[PrintType]" id="op-print_type" class="form-control js-required" required>
                        <option value="">--Wybierz--</option>
                        <option value="1" selected>Pełny adres</option>
                        <option value="2">Adres anonimowy</option>
                    </select>
                </div>
            </div>

            <button type="submit" id="oP-create" class="btn btn-warning">Utwórz</button>
        </form>
    </div>
</div>