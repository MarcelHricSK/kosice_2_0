<div dir="ltr"><br><br>
  <div class="gmail_quote">
    <div class="msg-7628555558286833510"><u></u>
      <div bgcolor="#fff">
        <table class="m_-7628555558286833510header-wrap" cellspacing="0" style="width: 100%">
          <tbody>
          <tr>
            <td></td>
            <td class="m_-7628555558286833510container">
              <div class="m_-7628555558286833510content">
                <center>
                  <img src="https://admin.ceknisa.sk/img/hotel_logo.png" alt="Hilson Apartments Jasná">
                </center>
              </div>
            </td>
            <td></td>
          </tr>
          <tr>
            <td colspan="3">
              <div
                style="background-image:url(&#39;https://admin.ceknisa.sk/img/bg_wave_1.png&#39;);height:95px;background-position:top center;background-repeat:repeat"></div>
            </td>
          </tr>
          </tbody>
        </table>
        <table class="m_-7628555558286833510body-wrap" bgcolor="#f4f4f4" style="width: 100%">
          <tbody>
          <tr>
            <td></td>
            <td class="m_-7628555558286833510container">
              <div id="m_-7628555558286833510email_content" class="m_-7628555558286833510content">
                <table>
                  <tbody>
                  <tr>
                    <td>
                      <h1>Dear {{ $offerOrder->full_name }}</h1>
                      <p>
                        We are happy to inform you that we have successfully verified and registered your reservation
                        request as follows:
                      </p>
                      <p></p>
                      <table class="m_-7628555558286833510center">
                        <tbody>
                        <tr>
                          <td width="160">
                            Offer number:
                          </td>
                          <td>
                            <strong>{{ $offerOrder->link }}</strong>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            Check-in date:
                          </td>
                          <td>
                            <strong>{{ $offerOrder->check_in->format('d.m.Y') }}</strong>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            Check-out date:
                          </td>
                          <td>
                            <strong>{{ $offerOrder->check_out->format('d.m.Y') }}</strong>
                          </td>
                        </tr>
                        <tr>
                          <td align="top">
                            Guests:
                          </td>
                          <td>
                            <strong>{{ $offerOrder->count_adults }}</strong> x <strong>adult</strong><br>
                            <strong>{{ $offerOrder->count_children }}</strong> x <strong>child</strong><br>
                            <strong>{{ $offerOrder->count_toddlers }}</strong> x <strong>toddler</strong><br>
                          </td>
                        </tr>
                        @foreach($offerOrder->packages as $package)
                          <tr>
                            <td align="top">
                              Booked accommodation:
                            </td>
                            <td>
                              @foreach($package->rooms as $room)
                                <strong>{{ $room->count }}</strong> x <strong>{{ $room->name }}</strong><br>
                              @endforeach
                            </td>
                          </tr>
                          <tr>
                            <td align="top">
                              Booked package:
                            </td>
                            <td>
                              {{ $package->name }}
                            </td>
                          </tr>
                          <tr>
                            <td align="top">
                              Package detail:
                            </td>
                            <td>
                              Price: <strong>{{ $package->sale_price ?: $package->price }}€</strong>
                            </td>
                          </tr>
                        @endforeach
                        <tr>
                          <td align="top">
                            Total:
                          </td>
                          <td>
                            <strong>{{ $offerOrder->total }}€</strong>
                          </td>
                        </tr>
                        <tr>
                          <td colspan="2">
                            <p>
                              Within a few moments, you’ll get a reservation confirmation directly from the hotel
                              system.
                              <br><br>
                              In case of need, feel free to contact us.
                              <br><br>
                              Best regards,
                              <br>
                              Team Hilson Jasná
                            </p>
                          </td>
                        </tr>
                        </tbody>
                      </table>
                    </td>
                  </tr>
                  </tbody>
                </table>
              </div>
            </td>
            <td></td>
          </tr>
          </tbody>
        </table>
        <table class="m_-7628555558286833510footer-wrap" cellspacing="0" style="width: 100%">
          <tbody>
          <tr>
            <td colspan="3">
              <div
                style="background-image:url(&#39;https://admin.ceknisa.sk/img/bg_wave_2.png&#39;);height:95px;background-position:top center;background-repeat:repeat"></div>
            </td>
          </tr>
          <tr>
            <td></td>
            <td class="m_-7628555558286833510container">
              <div class="m_-7628555558286833510content">
                <table>
                  <tbody>
                  <tr>
                    <td align="center">
                      <p>
                        <img
                          src="https://admin.ceknisa.sk/ping/r/f3c309976e1b25892b656ac6c560274d0715bc6ddc6cc351772a31f72795c7bf?"
                          alt="" width="1" height="1">
                      </p>
                    </td>
                  </tr>
                  </tbody>
                </table>
              </div>
            </td>
            <td></td>
          </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
