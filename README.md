## The Software

<img src="https://mattflaig.com/_next/image?url=https%3A%2F%2Fsuper-static-assets.s3.amazonaws.com%2F6f4ff171-2557-43c3-9f23-eaab086538ac%2Fimages%2F09e4e7a9-1efe-4a17-bd95-3a3a691ffda2.gif&w=3840&q=80" alt="Sign Controller Demo GIF" >


A custom web-app allowing users to easily select key parts of the logo and choose colors from a color picker. The software then provides a hardware agnostic API to write data to any standard DMX node (via ART-NET) or any CueServer (via binarybuffer).

---

## The Translator

Locally here, we’re using a CueServer2 Mini to act as the server and controller for the sign. It’s connected to our network on an IOT VLAN then receives data via ART-NET or http and transmits it’s over RJ45/CAT6 to the DMX RGB controllers.

---

## The Communicator

The DMX dimmer for the lights is a Bitro controller, which determines how much voltage is delivered to each color of RGB light. It appears to be identical (minus logo) to this one on Amazon: 

[SIRS-E 5 Channel CV DMX RDM Digital PWM Decoder 8/16 bits for RGB & RGBW LED Lighting 12-24V DC UL Recognized Controller 5x8A Dimmer 5809 SR-2108A-M5-5](https://www.amazon.com/Dimmer-Decoder-Channel-Recognized-Controller/dp/B07369SPLK/ref=pd_cart_vw_crc_2_5/146-3669641-8820736?_encoding=UTF8&pd_rd_i=B07369SPLK&pd_rd_r=932065ca-1bb1-4a70-a827-cbd35bee1f07&pd_rd_w=qoepp&pd_rd_wg=tPf0K&pf_rd_p=01004c92-8f40-4f1a-bee8-08cb36dccac2&pf_rd_r=JQ46BQDJTB4YM60JFA7V&psc=1&refRID=JQ46BQDJTB4YM60JFA7V)

---

The CueServer sends DMX (over a CAT6 cable) to the individual DMX receivers on the roof, which are individually addressed to each LED set in the letters.

### Physical Sign Fixture Addressing
Each address in the three channel range (1-3) is the Red, Green, Blue channels respectively.

---

## Credits
Pickr (https://github.com/Simonwep/pickr)
DragSelect (https://github.com/ThibaultJanBeyer/DragSelect)
jQuery (https://github.com/jquery/jquery)

