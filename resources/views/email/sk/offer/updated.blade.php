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
                      <h1>Dobrý deň, {{ $offer->profile->full_name }}</h1>
                      <p>Vaša ponuka, ktorú evidujeme pod číslom: <strong>{{ $offer->link }}</strong> bola upravená.</p>
                      <p></p>
                      <table class="m_-7628555558286833510center">
                        <tbody>
                        <tr>
                          <td width="160">
                            Číslo ponuky:
                          </td>
                          <td>
                            <strong>{{ $offer->link }}</strong>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            Dátum príchodu:
                          </td>
                          <td>
                            <strong>{{ $offer->check_in->format('d.m.Y') }}</strong>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            Dátum odchodu:
                          </td>
                          <td>
                            <strong>{{ $offer->check_out->format('d.m.Y') }}</strong>
                          </td>
                        </tr>
                        <tr>
                          <td align="top">
                            Počet osôb:
                          </td>
                          <td>
                            <strong>{{ $offer->count_adults }}</strong> x <strong>dospelí</strong><br>
                            <strong>{{ $offer->count_children }}</strong> x <strong>deti</strong><br>
                            <strong>{{ $offer->count_toddlers }}</strong> x <strong>batoľatá</strong><br>
                          </td>
                        </tr>
                        <tr>
                          <td colspan="2">
                            <a href="{{ $link }}"
                               style="display: inline-block; border: none; background: black; color: white; padding: 8px 16px; margin-top: 24px;">Pozrieť
                              ponuku</a>
                          </td>
                        </tr>
                        <tr>
                          <td colspan="2">
                            <a href="{{ $link }}" style="display: inline-block; margin-top: 16px">{{ $link }}</a>
                          </td>
                        </tr>
                        <tr>
                          <td colspan="2">
                            <p>
                              V prípade potreby Vám ostávame k dispozícií.
                              <br><br>
                              S pozdravom,
                              <br>
                              Tím Hilson Jasná
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
