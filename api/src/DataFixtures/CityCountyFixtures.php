<?php

namespace App\DataFixtures;

use App\Entity\City;
use App\Entity\County;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CityCountyFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $data = [];

        foreach ($this->cityCounty as $value) {
            if (!isset($data[$value[0]])) {
                $data[$value[0]] = [];
            }
            $data[$value[0]][] = $value[1];
        }

        foreach ($data as $cityValue => $countyValues) {
            $city = new City();
            $city->setTitle($cityValue);
            foreach ($countyValues as $countyValue) {
                $county = new County();
                $county->setTitle($countyValue);
                $manager->persist($county);
                $city->addCounty($county);
            }

            $manager->persist($city);
            $manager->flush();
        }
    }

    private $cityCounty = [
        [
            'ADANA', 'ALADAĞ'
        ],
        [
            'ADANA', 'CEYHAN'
        ],
        [
            'ADANA', 'ÇUKUROVA'
        ],
        [
            'ADANA', 'FEKE'
        ],
        [
            'ADANA', 'İMAMOĞLU'
        ],
        [
            'ADANA', 'KARAİSALI'
        ],
        [
            'ADANA', 'KARATAŞ'
        ],
        [
            'ADANA', 'KOZAN'
        ],
        [
            'ADANA', 'POZANTI'
        ],
        [
            'ADANA', 'SAİMBEYLİ'
        ],
        [
            'ADANA', 'SARIÇAM'
        ],
        [
            'ADANA', 'SEYHAN'
        ],
        [
            'ADANA', 'TUFANBEYLİ'
        ],
        [
            'ADANA', 'YUMURTALIK'
        ],
        [
            'ADANA', 'YÜREĞİR'
        ],
        [
            'ADIYAMAN', 'BESNİ'
        ],
        [
            'ADIYAMAN', 'ÇELİKHAN'
        ],
        [
            'ADIYAMAN', 'GERGER'
        ],
        [
            'ADIYAMAN', 'GÖLBAŞI'
        ],
        [
            'ADIYAMAN', 'KAHTA'
        ],
        [
            'ADIYAMAN', 'SAMSAT'
        ],
        [
            'ADIYAMAN', 'SİNCİK'
        ],
        [
            'ADIYAMAN', 'TUT'
        ],
        [
            'AFYONKARAHİSAR', 'BAŞMAKÇI'
        ],
        [
            'AFYONKARAHİSAR', 'BAYAT'
        ],
        [
            'AFYONKARAHİSAR', 'BOLVADİN'
        ],
        [
            'AFYONKARAHİSAR', 'ÇAY'
        ],
        [
            'AFYONKARAHİSAR', 'ÇOBANLAR'
        ],
        [
            'AFYONKARAHİSAR', 'DAZKIRI'
        ],
        [
            'AFYONKARAHİSAR', 'DİNAR'
        ],
        [
            'AFYONKARAHİSAR', 'EMİRDAĞ'
        ],
        [
            'AFYONKARAHİSAR', 'EVCİLER'
        ],
        [
            'AFYONKARAHİSAR', 'HOCALAR'
        ],
        [
            'AFYONKARAHİSAR', 'İHSANİYE'
        ],
        [
            'AFYONKARAHİSAR', 'İSCEHİSAR'
        ],
        [
            'AFYONKARAHİSAR', 'KIZILÖREN'
        ],
        [
            'AFYONKARAHİSAR', 'SANDIKLI'
        ],
        [
            'AFYONKARAHİSAR', 'SİNANPAŞA'
        ],
        [
            'AFYONKARAHİSAR', 'SULTANDAĞI'
        ],
        [
            'AFYONKARAHİSAR', 'ŞUHUT'
        ],
        [
            'AĞRI', 'DİYADİN'
        ],
        [
            'AĞRI', 'DOĞUBAYAZIT'
        ],
        [
            'AĞRI', 'ELEŞKİRT'
        ],
        [
            'AĞRI', 'HAMUR'
        ],
        [
            'AĞRI', 'PATNOS'
        ],
        [
            'AĞRI', 'TAŞLIÇAY'
        ],
        [
            'AĞRI', 'TUTA'
        ],
        [
            'AMASYA', 'GÖYNÜCEK'
        ],
        [
            'AMASYA', 'GÜMÜŞHACIKÖY'
        ],
        [
            'AMASYA', 'HAMAMÖZÜ'
        ],
        [
            'AMASYA', 'MERZİFON'
        ],
        [
            'AMASYA', 'SULUOVA'
        ],
        [
            'AMASYA', 'TAŞOVA'
        ],
        [
            'ANKARA', 'AKYURT'
        ],
        [
            'ANKARA', 'ALTINDAĞ'
        ],
        [
            'ANKARA', 'AYAŞ'
        ],
        [
            'ANKARA', 'BALA'
        ],
        [
            'ANKARA', 'BEYPAZARI'
        ],
        [
            'ANKARA', 'ÇAMLIDERE'
        ],
        [
            'ANKARA', 'ÇANKAYA'
        ],
        [
            'ANKARA', 'ÇUBUK'
        ],
        [
            'ANKARA', 'ELMADAĞ'
        ],
        [
            'ANKARA', 'ETİMESGUT'
        ],
        [
            'ANKARA', 'EVREN'
        ],
        [
            'ANKARA', 'GÖLBAŞI'
        ],
        [
            'ANKARA', 'GÜDÜL'
        ],
        [
            'ANKARA', 'HAYMANA'
        ],
        [
            'ANKARA', 'KALECİK'
        ],
        [
            'ANKARA', 'KAZAN'
        ],
        [
            'ANKARA', 'KEÇİÖREN'
        ],
        [
            'ANKARA', 'KIZILCAHAMAM'
        ],
        [
            'ANKARA', 'MAMAK'
        ],
        [
            'ANKARA', 'NALLIHAN'
        ],
        [
            'ANKARA', 'POLATLI'
        ],
        [
            'ANKARA', 'PURSAKLAR'
        ],
        [
            'ANKARA', 'SİNCAN'
        ],
        [
            'ANKARA', 'ŞEREFLİKOÇHİSAR'
        ],
        [
            'ANKARA', 'YENİMAHALLE'
        ],
        [
            'ANTALYA', 'AKSEKİ'
        ],
        [
            'ANTALYA', 'AKSU'
        ],
        [
            'ANTALYA', 'ALANYA'
        ],
        [
            'ANTALYA', 'DEMRE'
        ],
        [
            'ANTALYA', 'DÖŞEMEALTI'
        ],
        [
            'ANTALYA', 'ELMALI'
        ],
        [
            'ANTALYA', 'FİNİKE'
        ],
        [
            'ANTALYA', 'GAZİPAŞA'
        ],
        [
            'ANTALYA', 'GÜNDOĞMUŞ'
        ],
        [
            'ANTALYA', 'İBRADI'
        ],
        [
            'ANTALYA', 'KAŞ'
        ],
        [
            'ANTALYA', 'KEMER'
        ],
        [
            'ANTALYA', 'KEPEZ'
        ],
        [
            'ANTALYA', 'KONYAALTI'
        ],
        [
            'ANTALYA', 'KORKUTELİ'
        ],
        [
            'ANTALYA', 'KUMLUCA'
        ],
        [
            'ANTALYA', 'MANAVGAT'
        ],
        [
            'ANTALYA', 'MURATPAŞA'
        ],
        [
            'ANTALYA', 'SERİK'
        ],
        [
            'ARTVİN', 'ARDANUÇ'
        ],
        [
            'ARTVİN', 'ARHAVİ'
        ],
        [
            'ARTVİN', 'BORÇKA'
        ],
        [
            'ARTVİN', 'HOPA'
        ],
        [
            'ARTVİN', 'MURGUL'
        ],
        [
            'ARTVİN', 'ŞAVŞAT'
        ],
        [
            'ARTVİN', 'YUSUFELİ'
        ],
        [
            'AYDIN', 'BOZDOĞAN'
        ],
        [
            'AYDIN', 'BUHARKENT'
        ],
        [
            'AYDIN', 'ÇİNE'
        ],
        [
            'AYDIN', 'DİDİM'
        ],
        [
            'AYDIN', 'GERMENCİK'
        ],
        [
            'AYDIN', 'İNCİRLİOVA'
        ],
        [
            'AYDIN', 'KARACASU'
        ],
        [
            'AYDIN', 'KARPUZLU'
        ],
        [
            'AYDIN', 'KOÇARLI'
        ],
        [
            'AYDIN', 'KÖŞK'
        ],
        [
            'AYDIN', 'KUŞADASI'
        ],
        [
            'AYDIN', 'KUYUCAK'
        ],
        [
            'AYDIN', 'NAZİLLİ'
        ],
        [
            'AYDIN', 'SÖKE'
        ],
        [
            'AYDIN', 'SULTANHİSAR'
        ],
        [
            'AYDIN', 'YENİPAZAR'
        ],
        [
            'BALIKESİR', 'AYVALIK'
        ],
        [
            'BALIKESİR', 'BALYA'
        ],
        [
            'BALIKESİR', 'BANDIRMA'
        ],
        [
            'BALIKESİR', 'BİGADİÇ'
        ],
        [
            'BALIKESİR', 'BURHANİYE'
        ],
        [
            'BALIKESİR', 'DURSUNBEY'
        ],
        [
            'BALIKESİR', 'EDREMİT'
        ],
        [
            'BALIKESİR', 'ERDEK'
        ],
        [
            'BALIKESİR', 'GÖMEÇ'
        ],
        [
            'BALIKESİR', 'GÖNEN'
        ],
        [
            'BALIKESİR', 'HAVRAN'
        ],
        [
            'BALIKESİR', 'İVRİNDİ'
        ],
        [
            'BALIKESİR', 'KEPSUT'
        ],
        [
            'BALIKESİR', 'MANYAS'
        ],
        [
            'BALIKESİR', 'MARMARA'
        ],
        [
            'BALIKESİR', 'SAVAŞTEPE'
        ],
        [
            'BALIKESİR', 'SINDIRGI'
        ],
        [
            'BALIKESİR', 'SUSURLUK'
        ],
        [
            'BİLECİK', 'BOZÜYÜK'
        ],
        [
            'BİLECİK', 'GÖLPAZARI'
        ],
        [
            'BİLECİK', 'İNHİSAR'
        ],
        [
            'BİLECİK', 'OSMANELİ'
        ],
        [
            'BİLECİK', 'PAZARYERİ'
        ],
        [
            'BİLECİK', 'SÖĞÜT'
        ],
        [
            'BİLECİK', 'YENİPAZAR'
        ],
        [
            'BİNGÖL', 'ADAKLI'
        ],
        [
            'BİNGÖL', 'GENÇ'
        ],
        [
            'BİNGÖL', 'KARLIOVA'
        ],
        [
            'BİNGÖL', 'KİĞI'
        ],
        [
            'BİNGÖL', 'SOLHAN'
        ],
        [
            'BİNGÖL', 'YAYLADERE'
        ],
        [
            'BİNGÖL', 'YEDİSU'
        ],
        [
            'BİTLİS', 'ADİLCEVAZ'
        ],
        [
            'BİTLİS', 'AHLAT'
        ],
        [
            'BİTLİS', 'GÜROYMAK'
        ],
        [
            'BİTLİS', 'HİZAN'
        ],
        [
            'BİTLİS', 'MUTKİ'
        ],
        [
            'BİTLİS', 'TATVAN'
        ],
        [
            'BOLU', 'DÖRTDİVAN'
        ],
        [
            'BOLU', 'GEREDE'
        ],
        [
            'BOLU', 'GÖYNÜK'
        ],
        [
            'BOLU', 'KIBRISCIK'
        ],
        [
            'BOLU', 'MENGEN'
        ],
        [
            'BOLU', 'MUDURNU'
        ],
        [
            'BOLU', 'SEBEN'
        ],
        [
            'BOLU', 'YENİÇAĞA'
        ],
        [
            'BURDUR', 'AĞLASUN'
        ],
        [
            'BURDUR', 'ALTINYAYLA'
        ],
        [
            'BURDUR', 'BUCAK'
        ],
        [
            'BURDUR', 'ÇAVDIR'
        ],
        [
            'BURDUR', 'ÇELTİKÇİ'
        ],
        [
            'BURDUR', 'GÖLHİSAR'
        ],
        [
            'BURDUR', 'KARAMANLI'
        ],
        [
            'BURDUR', 'KEMER'
        ],
        [
            'BURDUR', 'TEFENNİ'
        ],
        [
            'BURDUR', 'YEŞİLOVA'
        ],
        [
            'BURSA', 'BÜYÜKORHAN'
        ],
        [
            'BURSA', 'GEMLİK'
        ],
        [
            'BURSA', 'GÜRSU'
        ],
        [
            'BURSA', 'HARMANCIK'
        ],
        [
            'BURSA', 'İNEGÖL'
        ],
        [
            'BURSA', 'İZNİK'
        ],
        [
            'BURSA', 'KARACABEY'
        ],
        [
            'BURSA', 'KELES'
        ],
        [
            'BURSA', 'KESTEL'
        ],
        [
            'BURSA', 'MUDANYA'
        ],
        [
            'BURSA', 'MUSTAFAKEMALPAŞA'
        ],
        [
            'BURSA', 'NİLÜFER'
        ],
        [
            'BURSA', 'ORHANELİ'
        ],
        [
            'BURSA', 'ORHANGAZİ'
        ],
        [
            'BURSA', 'OSMANGAZİ'
        ],
        [
            'BURSA', 'YENİŞEHİR'
        ],
        [
            'BURSA', 'YILDIRIM'
        ],
        [
            'ÇANAKKALE', 'AYVACIK'
        ],
        [
            'ÇANAKKALE', 'BAYRAMİÇ'
        ],
        [
            'ÇANAKKALE', 'BİGA'
        ],
        [
            'ÇANAKKALE', 'BOZCAADA'
        ],
        [
            'ÇANAKKALE', 'ÇAN'
        ],
        [
            'ÇANAKKALE', 'ECEABAT'
        ],
        [
            'ÇANAKKALE', 'EZİNE'
        ],
        [
            'ÇANAKKALE', 'GELİBOLU'
        ],
        [
            'ÇANAKKALE', 'İMROZ'
        ],
        [
            'ÇANAKKALE', 'LAPSEKİ'
        ],
        [
            'ÇANAKKALE', 'YENİCE'
        ],
        [
            'ÇANKIRI', 'ATKARACALAR'
        ],
        [
            'ÇANKIRI', 'BAYRAMÖREN'
        ],
        [
            'ÇANKIRI', 'ÇERKEŞ'
        ],
        [
            'ÇANKIRI', 'ELDİVAN'
        ],
        [
            'ÇANKIRI', 'ILGAZ'
        ],
        [
            'ÇANKIRI', 'KIZILIRMAK'
        ],
        [
            'ÇANKIRI', 'KORGUN'
        ],
        [
            'ÇANKIRI', 'KURŞUNLU'
        ],
        [
            'ÇANKIRI', 'ORTA'
        ],
        [
            'ÇANKIRI', 'ŞABANÖZÜ'
        ],
        [
            'ÇANKIRI', 'YAPRAKLI'
        ],
        [
            'ÇORUM', 'ALACA'
        ],
        [
            'ÇORUM', 'BAYAT'
        ],
        [
            'ÇORUM', 'BOĞAZKALE'
        ],
        [
            'ÇORUM', 'DODURGA'
        ],
        [
            'ÇORUM', 'İSKİLİP'
        ],
        [
            'ÇORUM', 'KARGI'
        ],
        [
            'ÇORUM', 'LAÇİN'
        ],
        [
            'ÇORUM', 'MECİTÖZÜ'
        ],
        [
            'ÇORUM', 'OĞUZLAR'
        ],
        [
            'ÇORUM', 'ORTAKÖY'
        ],
        [
            'ÇORUM', 'OSMANCIK'
        ],
        [
            'ÇORUM', 'SUNGURLU'
        ],
        [
            'ÇORUM', 'UĞURLUDAĞ'
        ],
        [
            'DENİZLİ', 'ACIPAYAM'
        ],
        [
            'DENİZLİ', 'PAMUKKALE'
        ],
        [
            'DENİZLİ', 'BABADAĞ'
        ],
        [
            'DENİZLİ', 'BAKLAN'
        ],
        [
            'DENİZLİ', 'BEKİLLİ'
        ],
        [
            'DENİZLİ', 'BEYAĞAÇ'
        ],
        [
            'DENİZLİ', 'BOZKURT'
        ],
        [
            'DENİZLİ', 'BULDAN'
        ],
        [
            'DENİZLİ', 'ÇAL'
        ],
        [
            'DENİZLİ', 'ÇAMELİ'
        ],
        [
            'DENİZLİ', 'ÇARDAK'
        ],
        [
            'DENİZLİ', 'ÇİVRİL'
        ],
        [
            'DENİZLİ', 'GÜNEY'
        ],
        [
            'DENİZLİ', 'HONAZ'
        ],
        [
            'DENİZLİ', 'KALE'
        ],
        [
            'DENİZLİ', 'SARAYKÖY'
        ],
        [
            'DENİZLİ', 'SERİNHİSAR'
        ],
        [
            'DENİZLİ', 'TAVAS'
        ],
        [
            'DİYARBAKIR', 'BAĞLAR'
        ],
        [
            'DİYARBAKIR', 'BİSMİL'
        ],
        [
            'DİYARBAKIR', 'ÇERMİK'
        ],
        [
            'DİYARBAKIR', 'ÇINAR'
        ],
        [
            'DİYARBAKIR', 'ÇÜNGÜŞ'
        ],
        [
            'DİYARBAKIR', 'DİCLE'
        ],
        [
            'DİYARBAKIR', 'EĞİL'
        ],
        [
            'DİYARBAKIR', 'ERGANİ'
        ],
        [
            'DİYARBAKIR', 'HANİ'
        ],
        [
            'DİYARBAKIR', 'HAZRO'
        ],
        [
            'DİYARBAKIR', 'KAYAPINAR'
        ],
        [
            'DİYARBAKIR', 'KOCAKÖY'
        ],
        [
            'DİYARBAKIR', 'KULP'
        ],
        [
            'DİYARBAKIR', 'LİCE'
        ],
        [
            'DİYARBAKIR', 'SİLVAN'
        ],
        [
            'DİYARBAKIR', 'SUR'
        ],
        [
            'DİYARBAKIR', 'YENİŞEHİR'
        ],
        [
            'EDİRNE', 'ENEZ'
        ],
        [
            'EDİRNE', 'HAVSA'
        ],
        [
            'EDİRNE', 'İPSALA'
        ],
        [
            'EDİRNE', 'KEŞAN'
        ],
        [
            'EDİRNE', 'LALAPAŞA'
        ],
        [
            'EDİRNE', 'MERİÇ'
        ],
        [
            'EDİRNE', 'SÜLOĞLU'
        ],
        [
            'EDİRNE', 'UZUNKÖPRÜ'
        ],
        [
            'ELAZIĞ', 'AĞIN'
        ],
        [
            'ELAZIĞ', 'ALACAKAYA'
        ],
        [
            'ELAZIĞ', 'ARICAK'
        ],
        [
            'ELAZIĞ', 'BASKİL'
        ],
        [
            'ELAZIĞ', 'KARAKOÇAN'
        ],
        [
            'ELAZIĞ', 'KEBAN'
        ],
        [
            'ELAZIĞ', 'KOVANCILAR'
        ],
        [
            'ELAZIĞ', 'MADEN'
        ],
        [
            'ELAZIĞ', 'PALU'
        ],
        [
            'ELAZIĞ', 'SİVRİCE'
        ],
        [
            'ERZİNCAN', 'ÇAYIRLI'
        ],
        [
            'ERZİNCAN', 'İLİÇ'
        ],
        [
            'ERZİNCAN', 'KEMAH'
        ],
        [
            'ERZİNCAN', 'KEMALİYE'
        ],
        [
            'ERZİNCAN', 'OTLUKBELİ'
        ],
        [
            'ERZİNCAN', 'REFAHİYE'
        ],
        [
            'ERZİNCAN', 'TERCAN'
        ],
        [
            'ERZİNCAN', 'ÜZÜMLÜ'
        ],
        [
            'ERZURUM', 'AŞKALE'
        ],
        [
            'ERZURUM', 'AZİZİYE'
        ],
        [
            'ERZURUM', 'ÇAT'
        ],
        [
            'ERZURUM', 'HINIS'
        ],
        [
            'ERZURUM', 'HORASAN'
        ],
        [
            'ERZURUM', 'İSPİR'
        ],
        [
            'ERZURUM', 'KARAÇOBAN'
        ],
        [
            'ERZURUM', 'KARAYAZI'
        ],
        [
            'ERZURUM', 'KÖPRÜKÖY'
        ],
        [
            'ERZURUM', 'NARMAN'
        ],
        [
            'ERZURUM', 'OLTU'
        ],
        [
            'ERZURUM', 'OLUR'
        ],
        [
            'ERZURUM', 'PALANDÖKEN'
        ],
        [
            'ERZURUM', 'PASİNLER'
        ],
        [
            'ERZURUM', 'PAZARYOLU'
        ],
        [
            'ERZURUM', 'ŞENKAYA'
        ],
        [
            'ERZURUM', 'TEKMAN'
        ],
        [
            'ERZURUM', 'TORTUM'
        ],
        [
            'ERZURUM', 'UZUNDERE'
        ],
        [
            'ERZURUM', 'YAKUTİYE'
        ],
        [
            'ESKİŞEHİR', 'ALPU'
        ],
        [
            'ESKİŞEHİR', 'BEYLİKOVA'
        ],
        [
            'ESKİŞEHİR', 'ÇİFTELER'
        ],
        [
            'ESKİŞEHİR', 'GÜNYÜZÜ'
        ],
        [
            'ESKİŞEHİR', 'HAN'
        ],
        [
            'ESKİŞEHİR', 'İNÖNÜ'
        ],
        [
            'ESKİŞEHİR', 'MAHMUDİYE'
        ],
        [
            'ESKİŞEHİR', 'MİHALGAZİ'
        ],
        [
            'ESKİŞEHİR', 'MİHALIÇÇIK'
        ],
        [
            'ESKİŞEHİR', 'ODUNPAZARI'
        ],
        [
            'ESKİŞEHİR', 'SARICAKAYA'
        ],
        [
            'ESKİŞEHİR', 'SEYİTGAZİ'
        ],
        [
            'ESKİŞEHİR', 'SİVRİHİSAR'
        ],
        [
            'ESKİŞEHİR', 'TEPEBAŞI'
        ],
        [
            'GAZİANTEP', 'ARABAN'
        ],
        [
            'GAZİANTEP', 'İSLAHİYE'
        ],
        [
            'GAZİANTEP', 'KARKAMIŞ'
        ],
        [
            'GAZİANTEP', 'NİZİP'
        ],
        [
            'GAZİANTEP', 'NURDAĞI'
        ],
        [
            'GAZİANTEP', 'OĞUZELİ'
        ],
        [
            'GAZİANTEP', 'ŞAHİNBEY'
        ],
        [
            'GAZİANTEP', 'ŞEHİTKAMİL'
        ],
        [
            'GAZİANTEP', 'YAVUZELİ'
        ],
        [
            'GİRESUN', 'ALUCRA'
        ],
        [
            'GİRESUN', 'BULANCAK'
        ],
        [
            'GİRESUN', 'ÇAMOLUK'
        ],
        [
            'GİRESUN', 'ÇANAKÇI'
        ],
        [
            'GİRESUN', 'DERELİ'
        ],
        [
            'GİRESUN', 'DOĞANKENT'
        ],
        [
            'GİRESUN', 'ESPİYE'
        ],
        [
            'GİRESUN', 'EYNESİL'
        ],
        [
            'GİRESUN', 'GÖRELE'
        ],
        [
            'GİRESUN', 'GÜCE'
        ],
        [
            'GİRESUN', 'KEŞAP'
        ],
        [
            'GİRESUN', 'PİRAZİZ'
        ],
        [
            'GİRESUN', 'ŞEBİNKARAHİSAR'
        ],
        [
            'GİRESUN', 'TİREBOLU'
        ],
        [
            'GİRESUN', 'YAĞLIDERE'
        ],
        [
            'GÜMÜŞHANE', 'KELKİT'
        ],
        [
            'GÜMÜŞHANE', 'KÖSE'
        ],
        [
            'GÜMÜŞHANE', 'KÜRTÜN'
        ],
        [
            'GÜMÜŞHANE', 'ŞİRAN'
        ],
        [
            'GÜMÜŞHANE', 'TORUL'
        ],
        [
            'HAKKARİ', 'ÇUKURCA'
        ],
        [
            'HAKKARİ', 'ŞEMDİNLİ'
        ],
        [
            'HAKKARİ', 'YÜKSEKOVA'
        ],
        [
            'HATAY', 'ALTINÖZÜ'
        ],
        [
            'HATAY', 'BELEN'
        ],
        [
            'HATAY', 'DÖRTYOL'
        ],
        [
            'HATAY', 'ERZİN'
        ],
        [
            'HATAY', 'HASSA'
        ],
        [
            'HATAY', 'İSKENDERUN'
        ],
        [
            'HATAY', 'KIRIKHAN'
        ],
        [
            'HATAY', 'KUMLU'
        ],
        [
            'HATAY', 'REYHANLI'
        ],
        [
            'HATAY', 'SAMANDAĞ'
        ],
        [
            'HATAY', 'YAYLADAĞI'
        ],
        [
            'ISPARTA', 'AKSU'
        ],
        [
            'ISPARTA', 'ATABEY'
        ],
        [
            'ISPARTA', 'EĞİRDİR'
        ],
        [
            'ISPARTA', 'GELENDOST'
        ],
        [
            'ISPARTA', 'GÖNEN'
        ],
        [
            'ISPARTA', 'KEÇİBORLU'
        ],
        [
            'ISPARTA', 'SENİRKENT'
        ],
        [
            'ISPARTA', 'SÜTÇÜLER'
        ],
        [
            'ISPARTA', 'ŞARKİKARAAĞAÇ'
        ],
        [
            'ISPARTA', 'ULUBORLU'
        ],
        [
            'ISPARTA', 'YALVAÇ'
        ],
        [
            'ISPARTA', 'YENİŞARBADEMLİ'
        ],
        [
            'MERSİN', 'AKDENİZ'
        ],
        [
            'MERSİN', 'ANAMUR'
        ],
        [
            'MERSİN', 'AYDINCIK'
        ],
        [
            'MERSİN', 'BOZYAZI'
        ],
        [
            'MERSİN', 'ÇAMLIYAYLA'
        ],
        [
            'MERSİN', 'ERDEMLİ'
        ],
        [
            'MERSİN', 'GÜLNAR'
        ],
        [
            'MERSİN', 'MEZİTLİ'
        ],
        [
            'MERSİN', 'MUT'
        ],
        [
            'MERSİN', 'SİLİFKE'
        ],
        [
            'MERSİN', 'TARSUS'
        ],
        [
            'MERSİN', 'TOROSLAR'
        ],
        [
            'MERSİN', 'YENİŞEHİR'
        ],
        [
            'İSTANBUL', 'ADALAR'
        ],
        [
            'İSTANBUL', 'ARNAVUTKÖY'
        ],
        [
            'İSTANBUL', 'ATAŞEHİR'
        ],
        [
            'İSTANBUL', 'AVCILAR'
        ],
        [
            'İSTANBUL', 'BAĞCILAR'
        ],
        [
            'İSTANBUL', 'BAHÇELİEVLER'
        ],
        [
            'İSTANBUL', 'BAKIRKÖY'
        ],
        [
            'İSTANBUL', 'BAŞAKŞEHİR'
        ],
        [
            'İSTANBUL', 'BAYRAMPAŞA'
        ],
        [
            'İSTANBUL', 'BEŞİKTAŞ'
        ],
        [
            'İSTANBUL', 'BEYKOZ'
        ],
        [
            'İSTANBUL', 'BEYLİKDÜZÜ'
        ],
        [
            'İSTANBUL', 'BEYOĞLU'
        ],
        [
            'İSTANBUL', 'BÜYÜKÇEKMECE'
        ],
        [
            'İSTANBUL', 'ÇATALCA'
        ],
        [
            'İSTANBUL', 'ÇEKMEKÖY'
        ],
        [
            'İSTANBUL', 'ESENLER'
        ],
        [
            'İSTANBUL', 'ESENYURT'
        ],
        [
            'İSTANBUL', 'EYÜP'
        ],
        [
            'İSTANBUL', 'FATİH'
        ],
        [
            'İSTANBUL', 'GAZİOSMANPAŞA'
        ],
        [
            'İSTANBUL', 'GÜNGÖREN'
        ],
        [
            'İSTANBUL', 'KADIKÖY'
        ],
        [
            'İSTANBUL', 'KAĞITHANE'
        ],
        [
            'İSTANBUL', 'KARTAL'
        ],
        [
            'İSTANBUL', 'KÜÇÜKÇEKMECE'
        ],
        [
            'İSTANBUL', 'MALTEPE'
        ],
        [
            'İSTANBUL', 'PENDİK'
        ],
        [
            'İSTANBUL', 'SANCAKTEPE'
        ],
        [
            'İSTANBUL', 'SARIYER'
        ],
        [
            'İSTANBUL', 'SİLİVRİ'
        ],
        [
            'İSTANBUL', 'SULTANBEYLİ'
        ],
        [
            'İSTANBUL', 'SULTANGAZİ'
        ],
        [
            'İSTANBUL', 'ŞİLE'
        ],
        [
            'İSTANBUL', 'ŞİŞLİ'
        ],
        [
            'İSTANBUL', 'TUZLA'
        ],
        [
            'İSTANBUL', 'ÜMRANİYE'
        ],
        [
            'İSTANBUL', 'ÜSKÜDAR'
        ],
        [
            'İSTANBUL', 'ZEYTİNBURNU'
        ],
        [
            'İZMİR', 'ALİAĞA'
        ],
        [
            'İZMİR', 'BALÇOVA'
        ],
        [
            'İZMİR', 'BAYINDIR'
        ],
        [
            'İZMİR', 'BAYRAKLI'
        ],
        [
            'İZMİR', 'BERGAMA'
        ],
        [
            'İZMİR', 'BEYDAĞ'
        ],
        [
            'İZMİR', 'BORNOVA'
        ],
        [
            'İZMİR', 'BUCA'
        ],
        [
            'İZMİR', 'ÇEŞME'
        ],
        [
            'İZMİR', 'ÇİĞLİ'
        ],
        [
            'İZMİR', 'DİKİLİ'
        ],
        [
            'İZMİR', 'FOÇA'
        ],
        [
            'İZMİR', 'GAZİEMİR'
        ],
        [
            'İZMİR', 'GÜZELBAHÇE'
        ],
        [
            'İZMİR', 'KARABAĞLAR'
        ],
        [
            'İZMİR', 'KARABURUN'
        ],
        [
            'İZMİR', 'KARŞIYAKA'
        ],
        [
            'İZMİR', 'KEMALPAŞA'
        ],
        [
            'İZMİR', 'KINIK'
        ],
        [
            'İZMİR', 'KİRAZ'
        ],
        [
            'İZMİR', 'KONAK'
        ],
        [
            'İZMİR', 'MENDERES'
        ],
        [
            'İZMİR', 'MENEMEN'
        ],
        [
            'İZMİR', 'NARLIDERE'
        ],
        [
            'İZMİR', 'ÖDEMİŞ'
        ],
        [
            'İZMİR', 'SEFERİHİSAR'
        ],
        [
            'İZMİR', 'SELÇUK'
        ],
        [
            'İZMİR', 'TİRE'
        ],
        [
            'İZMİR', 'TORBALI'
        ],
        [
            'İZMİR', 'URLA'
        ],
        [
            'KARS', 'AKYAKA'
        ],
        [
            'KARS', 'ARPAÇAY'
        ],
        [
            'KARS', 'DİGOR'
        ],
        [
            'KARS', 'KAĞIZMAN'
        ],
        [
            'KARS', 'SARIKAMIŞ'
        ],
        [
            'KARS', 'SELİM'
        ],
        [
            'KARS', 'SUSUZ'
        ],
        [
            'KASTAMONU', 'ABANA'
        ],
        [
            'KASTAMONU', 'AĞLI'
        ],
        [
            'KASTAMONU', 'ARAÇ'
        ],
        [
            'KASTAMONU', 'AZDAVAY'
        ],
        [
            'KASTAMONU', 'BOZKURT'
        ],
        [
            'KASTAMONU', 'CİDE'
        ],
        [
            'KASTAMONU', 'ÇATALZEYTİN'
        ],
        [
            'KASTAMONU', 'DADAY'
        ],
        [
            'KASTAMONU', 'DEVREKANİ'
        ],
        [
            'KASTAMONU', 'DOĞANYURT'
        ],
        [
            'KASTAMONU', 'HANÖNÜ'
        ],
        [
            'KASTAMONU', 'İHSANGAZİ'
        ],
        [
            'KASTAMONU', 'İNEBOLU'
        ],
        [
            'KASTAMONU', 'KÜRE'
        ],
        [
            'KASTAMONU', 'PINARBAŞI'
        ],
        [
            'KASTAMONU', 'SEYDİLER'
        ],
        [
            'KASTAMONU', 'ŞENPAZAR'
        ],
        [
            'KASTAMONU', 'TAŞKÖPRÜ'
        ],
        [
            'KASTAMONU', 'TOSYA'
        ],
        [
            'KAYSERİ', 'AKKIŞLA'
        ],
        [
            'KAYSERİ', 'BÜNYAN'
        ],
        [
            'KAYSERİ', 'DEVELİ'
        ],
        [
            'KAYSERİ', 'FELAHİYE'
        ],
        [
            'KAYSERİ', 'HACILAR'
        ],
        [
            'KAYSERİ', 'İNCESU'
        ],
        [
            'KAYSERİ', 'KOCASİNAN'
        ],
        [
            'KAYSERİ', 'MELİKGAZİ'
        ],
        [
            'KAYSERİ', 'ÖZVATAN'
        ],
        [
            'KAYSERİ', 'PINARBAŞI'
        ],
        [
            'KAYSERİ', 'SARIOĞLAN'
        ],
        [
            'KAYSERİ', 'SARIZ'
        ],
        [
            'KAYSERİ', 'TALAS'
        ],
        [
            'KAYSERİ', 'TOMARZA'
        ],
        [
            'KAYSERİ', 'YAHYALI'
        ],
        [
            'KAYSERİ', 'YEŞİLHİSAR'
        ],
        [
            'KIRKLARELİ', 'BABAESKİ'
        ],
        [
            'KIRKLARELİ', 'DEMİRKÖY'
        ],
        [
            'KIRKLARELİ', 'KOFÇAZ'
        ],
        [
            'KIRKLARELİ', 'LÜLEBURGAZ'
        ],
        [
            'KIRKLARELİ', 'PEHLİVANKÖY'
        ],
        [
            'KIRKLARELİ', 'PINARHİSAR'
        ],
        [
            'KIRKLARELİ', 'VİZE'
        ],
        [
            'KIRŞEHİR', 'AKÇAKENT'
        ],
        [
            'KIRŞEHİR', 'AKPINAR'
        ],
        [
            'KIRŞEHİR', 'BOZTEPE'
        ],
        [
            'KIRŞEHİR', 'ÇİÇEKDAĞI'
        ],
        [
            'KIRŞEHİR', 'KAMAN'
        ],
        [
            'KIRŞEHİR', 'MUCUR'
        ],
        [
            'KOCAELİ', 'BAŞİSKELE'
        ],
        [
            'KOCAELİ', 'ÇAYIROVA'
        ],
        [
            'KOCAELİ', 'DARICA'
        ],
        [
            'KOCAELİ', 'DERİNCE'
        ],
        [
            'KOCAELİ', 'DİLOVASI'
        ],
        [
            'KOCAELİ', 'GEBZE'
        ],
        [
            'KOCAELİ', 'GÖLCÜK'
        ],
        [
            'KOCAELİ', 'İZMİT'
        ],
        [
            'KOCAELİ', 'KANDIRA'
        ],
        [
            'KOCAELİ', 'KARAMÜRSEL'
        ],
        [
            'KOCAELİ', 'KARTEPE'
        ],
        [
            'KOCAELİ', 'KÖRFEZ'
        ],
        [
            'KONYA', 'AHIRLI'
        ],
        [
            'KONYA', 'AKÖREN'
        ],
        [
            'KONYA', 'AKŞEHİR'
        ],
        [
            'KONYA', 'ALTINEKİN'
        ],
        [
            'KONYA', 'BEYŞEHİR'
        ],
        [
            'KONYA', 'BOZKIR'
        ],
        [
            'KONYA', 'CİHANBEYLİ'
        ],
        [
            'KONYA', 'ÇELTİK'
        ],
        [
            'KONYA', 'ÇUMRA'
        ],
        [
            'KONYA', 'DERBENT'
        ],
        [
            'KONYA', 'DEREBUCAK'
        ],
        [
            'KONYA', 'DOĞANHİSAR'
        ],
        [
            'KONYA', 'EMİRGAZİ'
        ],
        [
            'KONYA', 'EREĞLİ'
        ],
        [
            'KONYA', 'GÜNEYSINIR'
        ],
        [
            'KONYA', 'HADİM'
        ],
        [
            'KONYA', 'HALKAPINAR'
        ],
        [
            'KONYA', 'HÜYÜK'
        ],
        [
            'KONYA', 'ILGIN'
        ],
        [
            'KONYA', 'KADINHANI'
        ],
        [
            'KONYA', 'KARAPINAR'
        ],
        [
            'KONYA', 'KARATAY'
        ],
        [
            'KONYA', 'KULU'
        ],
        [
            'KONYA', 'MERAM'
        ],
        [
            'KONYA', 'SARAYÖNÜ'
        ],
        [
            'KONYA', 'SELÇUKLU'
        ],
        [
            'KONYA', 'SEYDİŞEHİR'
        ],
        [
            'KONYA', 'TAŞKENT'
        ],
        [
            'KONYA', 'TUZLUKÇU'
        ],
        [
            'KONYA', 'YALIHÜYÜK'
        ],
        [
            'KONYA', 'YUNAK'
        ],
        [
            'KÜTAHYA', 'ALTINTAŞ'
        ],
        [
            'KÜTAHYA', 'ASLANAPA'
        ],
        [
            'KÜTAHYA', 'ÇAVDARHİSAR'
        ],
        [
            'KÜTAHYA', 'DOMANİÇ'
        ],
        [
            'KÜTAHYA', 'DUMLUPINAR'
        ],
        [
            'KÜTAHYA', 'EMET'
        ],
        [
            'KÜTAHYA', 'GEDİZ'
        ],
        [
            'KÜTAHYA', 'HİSARCIK'
        ],
        [
            'KÜTAHYA', 'PAZARLAR'
        ],
        [
            'KÜTAHYA', 'SİMAV'
        ],
        [
            'KÜTAHYA', 'ŞAPHANE'
        ],
        [
            'KÜTAHYA', 'TAVŞANLI'
        ],
        [
            'MALATYA', 'AKÇADAĞ'
        ],
        [
            'MALATYA', 'ARAPGİR'
        ],
        [
            'MALATYA', 'ARGUVAN'
        ],
        [
            'MALATYA', 'BATTALGAZİ'
        ],
        [
            'MALATYA', 'DARENDE'
        ],
        [
            'MALATYA', 'DOĞANŞEHİR'
        ],
        [
            'MALATYA', 'DOĞANYOL'
        ],
        [
            'MALATYA', 'HEKİMHAN'
        ],
        [
            'MALATYA', 'KALE'
        ],
        [
            'MALATYA', 'KULUNCAK'
        ],
        [
            'MALATYA', 'PÜTÜRGE'
        ],
        [
            'MALATYA', 'YAZIHAN'
        ],
        [
            'MALATYA', 'YEŞİLYURT'
        ],
        [
            'MANİSA', 'AHMETLİ'
        ],
        [
            'MANİSA', 'AKHİSAR'
        ],
        [
            'MANİSA', 'ALAŞEHİR'
        ],
        [
            'MANİSA', 'DEMİRCİ'
        ],
        [
            'MANİSA', 'GÖLMARMARA'
        ],
        [
            'MANİSA', 'GÖRDES'
        ],
        [
            'MANİSA', 'KIRKAĞAÇ'
        ],
        [
            'MANİSA', 'KÖPRÜBAŞI'
        ],
        [
            'MANİSA', 'KULA'
        ],
        [
            'MANİSA', 'SALİHLİ'
        ],
        [
            'MANİSA', 'SARIGÖL'
        ],
        [
            'MANİSA', 'SARUHANLI'
        ],
        [
            'MANİSA', 'SELENDİ'
        ],
        [
            'MANİSA', 'SOMA'
        ],
        [
            'MANİSA', 'TURGUTLU'
        ],
        [
            'KAHRAMANMARAŞ', 'AFŞİN'
        ],
        [
            'KAHRAMANMARAŞ', 'ANDIRIN'
        ],
        [
            'KAHRAMANMARAŞ', 'ÇAĞLAYANCERİT'
        ],
        [
            'KAHRAMANMARAŞ', 'EKİNÖZÜ'
        ],
        [
            'KAHRAMANMARAŞ', 'ELBİSTAN'
        ],
        [
            'KAHRAMANMARAŞ', 'GÖKSUN'
        ],
        [
            'KAHRAMANMARAŞ', 'NURHAK'
        ],
        [
            'KAHRAMANMARAŞ', 'PAZARCIK'
        ],
        [
            'KAHRAMANMARAŞ', 'TÜRKOĞLU'
        ],
        [
            'MARDİN', 'DARGEÇİT'
        ],
        [
            'MARDİN', 'DERİK'
        ],
        [
            'MARDİN', 'KIZILTEPE'
        ],
        [
            'MARDİN', 'MAZIDAĞI'
        ],
        [
            'MARDİN', 'MİDYAT'
        ],
        [
            'MARDİN', 'NUSAYBİN'
        ],
        [
            'MARDİN', 'ÖMERLİ'
        ],
        [
            'MARDİN', 'SAVUR'
        ],
        [
            'MARDİN', 'YEŞİLLİ'
        ],
        [
            'MUĞLA', 'BODRUM'
        ],
        [
            'MUĞLA', 'DALAMAN'
        ],
        [
            'MUĞLA', 'DATÇA'
        ],
        [
            'MUĞLA', 'FETHİYE'
        ],
        [
            'MUĞLA', 'KAVAKLIDERE'
        ],
        [
            'MUĞLA', 'KÖYCEĞİZ'
        ],
        [
            'MUĞLA', 'MARMARİS'
        ],
        [
            'MUĞLA', 'MİLAS'
        ],
        [
            'MUĞLA', 'ORTACA'
        ],
        [
            'MUĞLA', 'ULA'
        ],
        [
            'MUĞLA', 'YATAĞAN'
        ],
        [
            'MUŞ', 'BULANIK'
        ],
        [
            'MUŞ', 'HASKÖY'
        ],
        [
            'MUŞ', 'KORKUT'
        ],
        [
            'MUŞ', 'MALAZGİRT'
        ],
        [
            'MUŞ', 'VARTO'
        ],
        [
            'NEVŞEHİR', 'ACIGÖL'
        ],
        [
            'NEVŞEHİR', 'AVANOS'
        ],
        [
            'NEVŞEHİR', 'DERİNKUYU'
        ],
        [
            'NEVŞEHİR', 'GÜLŞEHİR'
        ],
        [
            'NEVŞEHİR', 'HACIBEKTAŞ'
        ],
        [
            'NEVŞEHİR', 'KOZAKLI'
        ],
        [
            'NEVŞEHİR', 'ÜRGÜP'
        ],
        [
            'NİĞDE', 'ALTUNHİSAR'
        ],
        [
            'NİĞDE', 'BOR'
        ],
        [
            'NİĞDE', 'ÇAMARDI'
        ],
        [
            'NİĞDE', 'ÇİFTLİK'
        ],
        [
            'NİĞDE', 'ULUKIŞLA'
        ],
        [
            'ORDU', 'AKKUŞ'
        ],
        [
            'ORDU', 'AYBASTI'
        ],
        [
            'ORDU', 'ÇAMAŞ'
        ],
        [
            'ORDU', 'ÇATALPINAR'
        ],
        [
            'ORDU', 'ÇAYBAŞI'
        ],
        [
            'ORDU', 'FATSA'
        ],
        [
            'ORDU', 'GÖLKÖY'
        ],
        [
            'ORDU', 'GÜLYALI'
        ],
        [
            'ORDU', 'GÜRGENTEPE'
        ],
        [
            'ORDU', 'İKİZCE'
        ],
        [
            'ORDU', 'KABADÜZ'
        ],
        [
            'ORDU', 'KABATAŞ'
        ],
        [
            'ORDU', 'KORGAN'
        ],
        [
            'ORDU', 'KUMRU'
        ],
        [
            'ORDU', 'MESUDİYE'
        ],
        [
            'ORDU', 'PERŞEMBE'
        ],
        [
            'ORDU', 'ULUBEY'
        ],
        [
            'ORDU', 'ÜNYE'
        ],
        [
            'RİZE', 'ARDEŞEN'
        ],
        [
            'RİZE', 'ÇAMLIHEMŞİN'
        ],
        [
            'RİZE', 'ÇAYELİ'
        ],
        [
            'RİZE', 'DEREPAZARI'
        ],
        [
            'RİZE', 'FINDIKLI'
        ],
        [
            'RİZE', 'GÜNEYSU'
        ],
        [
            'RİZE', 'HEMŞİN'
        ],
        [
            'RİZE', 'İKİZDERE'
        ],
        [
            'RİZE', 'İYİDERE'
        ],
        [
            'RİZE', 'KALKANDERE'
        ],
        [
            'RİZE', 'PAZAR'
        ],
        [
            'SAKARYA', 'ADAPAZARI'
        ],
        [
            'SAKARYA', 'AKYAZI'
        ],
        [
            'SAKARYA', 'ARİFİYE'
        ],
        [
            'SAKARYA', 'ERENLER'
        ],
        [
            'SAKARYA', 'FERİZLİ'
        ],
        [
            'SAKARYA', 'GEYVE'
        ],
        [
            'SAKARYA', 'HENDEK'
        ],
        [
            'SAKARYA', 'KARAPÜRÇEK'
        ],
        [
            'SAKARYA', 'KARASU'
        ],
        [
            'SAKARYA', 'KAYNARCA'
        ],
        [
            'SAKARYA', 'KOCAALİ'
        ],
        [
            'SAKARYA', 'PAMUKOVA'
        ],
        [
            'SAKARYA', 'SAPANCA'
        ],
        [
            'SAKARYA', 'SERDİVAN'
        ],
        [
            'SAKARYA', 'SÖĞÜTLÜ'
        ],
        [
            'SAKARYA', 'TARAKLI'
        ],
        [
            'SAMSUN', 'ONDOKUZMAYIS'
        ],
        [
            'SAMSUN', 'ALAÇAM'
        ],
        [
            'SAMSUN', 'ASARCIK'
        ],
        [
            'SAMSUN', 'ATAKUM'
        ],
        [
            'SAMSUN', 'AYVACIK'
        ],
        [
            'SAMSUN', 'BAFRA'
        ],
        [
            'SAMSUN', 'CANİK'
        ],
        [
            'SAMSUN', 'ÇARŞAMBA'
        ],
        [
            'SAMSUN', 'HAVZA'
        ],
        [
            'SAMSUN', 'İLKADIM'
        ],
        [
            'SAMSUN', 'KAVAK'
        ],
        [
            'SAMSUN', 'LADİK'
        ],
        [
            'SAMSUN', 'SALIPAZARI'
        ],
        [
            'SAMSUN', 'TEKKEKÖY'
        ],
        [
            'SAMSUN', 'TERME'
        ],
        [
            'SAMSUN', 'VEZİRKÖPRÜ'
        ],
        [
            'SAMSUN', 'YAKAKENT'
        ],
        [
            'SİİRT', 'AYDINLAR'
        ],
        [
            'SİİRT', 'BAYKAN'
        ],
        [
            'SİİRT', 'ERUH'
        ],
        [
            'SİİRT', 'KURTALAN'
        ],
        [
            'SİİRT', 'PERVARİ'
        ],
        [
            'SİİRT', 'ŞİRVAN'
        ],
        [
            'SİNOP', 'AYANCIK'
        ],
        [
            'SİNOP', 'BOYABAT'
        ],
        [
            'SİNOP', 'DİKMEN'
        ],
        [
            'SİNOP', 'DURAĞAN'
        ],
        [
            'SİNOP', 'ERFELEK'
        ],
        [
            'SİNOP', 'GERZE'
        ],
        [
            'SİNOP', 'SARAYDÜZÜ'
        ],
        [
            'SİNOP', 'TÜRKELİ'
        ],
        [
            'SİVAS', 'AKINCILAR'
        ],
        [
            'SİVAS', 'ALTINYAYLA'
        ],
        [
            'SİVAS', 'DİVRİĞİ'
        ],
        [
            'SİVAS', 'DOĞANŞAR'
        ],
        [
            'SİVAS', 'GEMEREK'
        ],
        [
            'SİVAS', 'GÖLOVA'
        ],
        [
            'SİVAS', 'GÜRÜN'
        ],
        [
            'SİVAS', 'HAFİK'
        ],
        [
            'SİVAS', 'İMRANLI'
        ],
        [
            'SİVAS', 'KANGAL'
        ],
        [
            'SİVAS', 'KOYULHİSAR'
        ],
        [
            'SİVAS', 'SUŞEHRİ'
        ],
        [
            'SİVAS', 'ŞARKIŞLA'
        ],
        [
            'SİVAS', 'ULAŞ'
        ],
        [
            'SİVAS', 'YILDIZELİ'
        ],
        [
            'SİVAS', 'ZARA'
        ],
        [
            'TEKİRDAĞ', 'ÇERKEZKÖY'
        ],
        [
            'TEKİRDAĞ', 'ÇORLU'
        ],
        [
            'TEKİRDAĞ', 'HAYRABOLU'
        ],
        [
            'TEKİRDAĞ', 'MALKARA'
        ],
        [
            'TEKİRDAĞ', 'MARMARAEREĞLİSİ'
        ],
        [
            'TEKİRDAĞ', 'MURATLI'
        ],
        [
            'TEKİRDAĞ', 'SARAY'
        ],
        [
            'TEKİRDAĞ', 'ŞARKÖY'
        ],
        [
            'TOKAT', 'ALMUS'
        ],
        [
            'TOKAT', 'ARTOVA'
        ],
        [
            'TOKAT', 'BAŞÇİFTLİK'
        ],
        [
            'TOKAT', 'ERBAA'
        ],
        [
            'TOKAT', 'NİKSAR'
        ],
        [
            'TOKAT', 'PAZAR'
        ],
        [
            'TOKAT', 'REŞADİYE'
        ],
        [
            'TOKAT', 'SULUSARAY'
        ],
        [
            'TOKAT', 'TURHAL'
        ],
        [
            'TOKAT', 'YEŞİLYURT'
        ],
        [
            'TOKAT', 'ZİLE'
        ],
        [
            'TRABZON', 'AKÇAABAT'
        ],
        [
            'TRABZON', 'ARAKLI'
        ],
        [
            'TRABZON', 'ARSİN'
        ],
        [
            'TRABZON', 'BEŞİKDÜZÜ'
        ],
        [
            'TRABZON', 'ÇARŞIBAŞI'
        ],
        [
            'TRABZON', 'ÇAYKARA'
        ],
        [
            'TRABZON', 'DERNEKPAZARI'
        ],
        [
            'TRABZON', 'DÜZKÖY'
        ],
        [
            'TRABZON', 'HAYRAT'
        ],
        [
            'TRABZON', 'KÖPRÜBAŞI'
        ],
        [
            'TRABZON', 'MAÇKA'
        ],
        [
            'TRABZON', 'OF'
        ],
        [
            'TRABZON', 'SÜRMENE'
        ],
        [
            'TRABZON', 'ŞALPAZARI'
        ],
        [
            'TRABZON', 'TONYA'
        ],
        [
            'TRABZON', 'VAKFIKEBİR'
        ],
        [
            'TRABZON', 'YOMRA'
        ],
        [
            'TUNCELİ', 'ÇEMİŞGEZEK'
        ],
        [
            'TUNCELİ', 'HOZAT'
        ],
        [
            'TUNCELİ', 'MAZGİRT'
        ],
        [
            'TUNCELİ', 'NAZIMİYE'
        ],
        [
            'TUNCELİ', 'OVACIK'
        ],
        [
            'TUNCELİ', 'PERTEK'
        ],
        [
            'TUNCELİ', 'PÜLÜMÜR'
        ],
        [
            'ŞANLIURFA', 'AKÇAKALE'
        ],
        [
            'ŞANLIURFA', 'BİRECİK'
        ],
        [
            'ŞANLIURFA', 'BOZOVA'
        ],
        [
            'ŞANLIURFA', 'CEYLANPINAR'
        ],
        [
            'ŞANLIURFA', 'HALFETİ'
        ],
        [
            'ŞANLIURFA', 'HARRAN'
        ],
        [
            'ŞANLIURFA', 'HİLVAN'
        ],
        [
            'ŞANLIURFA', 'SİVEREK'
        ],
        [
            'ŞANLIURFA', 'SURUÇ'
        ],
        [
            'ŞANLIURFA', 'VİRANŞEHİR'
        ],
        [
            'UŞAK', 'BANAZ'
        ],
        [
            'UŞAK', 'EŞME'
        ],
        [
            'UŞAK', 'KARAHALLI'
        ],
        [
            'UŞAK', 'SİVASLI'
        ],
        [
            'UŞAK', 'ULUBEY'
        ],
        [
            'VAN', 'BAHÇESARAY'
        ],
        [
            'VAN', 'BAŞKALE'
        ],
        [
            'VAN', 'ÇALDIRAN'
        ],
        [
            'VAN', 'ÇATAK'
        ],
        [
            'VAN', 'EDREMİT'
        ],
        [
            'VAN', 'ERCİŞ'
        ],
        [
            'VAN', 'GEVAŞ'
        ],
        [
            'VAN', 'GÜRPINAR'
        ],
        [
            'VAN', 'MURADİYE'
        ],
        [
            'VAN', 'ÖZALP'
        ],
        [
            'VAN', 'SARAY'
        ],
        [
            'YOZGAT', 'AKDAĞMADENİ'
        ],
        [
            'YOZGAT', 'AYDINCIK'
        ],
        [
            'YOZGAT', 'BOĞAZLIYAN'
        ],
        [
            'YOZGAT', 'ÇANDIR'
        ],
        [
            'YOZGAT', 'ÇAYIRALAN'
        ],
        [
            'YOZGAT', 'ÇEKEREK'
        ],
        [
            'YOZGAT', 'KADIŞEHRİ'
        ],
        [
            'YOZGAT', 'SARAYKENT'
        ],
        [
            'YOZGAT', 'SARIKAYA'
        ],
        [
            'YOZGAT', 'SORGUN'
        ],
        [
            'YOZGAT', 'ŞEFAATLİ'
        ],
        [
            'YOZGAT', 'YENİFAKILI'
        ],
        [
            'YOZGAT', 'YERKÖY'
        ],
        [
            'ZONGULDAK', 'ALAPLI'
        ],
        [
            'ZONGULDAK', 'ÇAYCUMA'
        ],
        [
            'ZONGULDAK', 'DEVREK'
        ],
        [
            'ZONGULDAK', 'EREĞLİ'
        ],
        [
            'ZONGULDAK', 'GÖKÇEBEY'
        ],
        [
            'AKSARAY', 'AĞAÇÖREN'
        ],
        [
            'AKSARAY', 'ESKİL'
        ],
        [
            'AKSARAY', 'GÜLAĞAÇ'
        ],
        [
            'AKSARAY', 'GÜZELYURT'
        ],
        [
            'AKSARAY', 'ORTAKÖY'
        ],
        [
            'AKSARAY', 'SARIYAHŞİ'
        ],
        [
            'BAYBURT', 'AYDINTEPE'
        ],
        [
            'BAYBURT', 'DEMİRÖZÜ'
        ],
        [
            'KARAMAN', 'AYRANCI'
        ],
        [
            'KARAMAN', 'BAŞYAYLA'
        ],
        [
            'KARAMAN', 'ERMENEK'
        ],
        [
            'KARAMAN', 'KAZIMKARABEKİR'
        ],
        [
            'KARAMAN', 'SARIVELİLER'
        ],
        [
            'KIRIKKALE', 'BAHŞİLİ'
        ],
        [
            'KIRIKKALE', 'BALIŞEYH'
        ],
        [
            'KIRIKKALE', 'ÇELEBİ'
        ],
        [
            'KIRIKKALE', 'DELİCE'
        ],
        [
            'KIRIKKALE', 'KARAKEÇİLİ'
        ],
        [
            'KIRIKKALE', 'KESKİN'
        ],
        [
            'KIRIKKALE', 'SULAKYURT'
        ],
        [
            'KIRIKKALE', 'YAHŞİHAN'
        ],
        [
            'BATMAN', 'BEŞİRİ'
        ],
        [
            'BATMAN', 'GERCÜŞ'
        ],
        [
            'BATMAN', 'HASANKEYF'
        ],
        [
            'BATMAN', 'KOZLUK'
        ],
        [
            'BATMAN', 'SASON'
        ],
        [
            'ŞIRNAK', 'BEYTÜŞŞEBAP'
        ],
        [
            'ŞIRNAK', 'CİZRE'
        ],
        [
            'ŞIRNAK', 'GÜÇLÜKONAK'
        ],
        [
            'ŞIRNAK', 'İDİL'
        ],
        [
            'ŞIRNAK', 'SİLOPİ'
        ],
        [
            'ŞIRNAK', 'ULUDERE'
        ],
        [
            'BARTIN', 'AMASRA'
        ],
        [
            'BARTIN', 'KURUCAŞİLE'
        ],
        [
            'BARTIN', 'ULUS'
        ],
        [
            'ARDAHAN', 'ÇILDIR'
        ],
        [
            'ARDAHAN', 'DAMAL'
        ],
        [
            'ARDAHAN', 'GÖLE'
        ],
        [
            'ARDAHAN', 'HANAK'
        ],
        [
            'ARDAHAN', 'POSOF'
        ],
        [
            'IĞDIR', 'ARALIK'
        ],
        [
            'IĞDIR', 'KARAKOYUNLU'
        ],
        [
            'IĞDIR', 'TUZLUCA'
        ],
        [
            'YALOVA', 'ALTINOVA'
        ],
        [
            'YALOVA', 'ARMUTLU'
        ],
        [
            'YALOVA', 'ÇINARCIK'
        ],
        [
            'YALOVA', 'ÇİFTLİKKÖY'
        ],
        [
            'YALOVA', 'TERMAL'
        ],
        [
            'KARABÜK', 'EFLANİ'
        ],
        [
            'KARABÜK', 'ESKİPAZAR'
        ],
        [
            'KARABÜK', 'OVACIK'
        ],
        [
            'KARABÜK', 'SAFRANBOLU'
        ],
        [
            'KARABÜK', 'YENİCE'
        ],
        [
            'KİLİS', 'ELBEYLİ'
        ],
        [
            'KİLİS', 'MUSABEYLİ'
        ],
        [
            'KİLİS', 'POLATELİ'
        ],
        [
            'OSMANİYE', 'BAHÇE'
        ],
        [
            'OSMANİYE', 'DÜZİÇİ'
        ],
        [
            'OSMANİYE', 'HASANBEYLİ'
        ],
        [
            'OSMANİYE', 'KADİRLİ'
        ],
        [
            'OSMANİYE', 'SUMBAS'
        ],
        [
            'OSMANİYE', 'TOPRAKKALE'
        ],
        [
            'DÜZCE', 'AKÇAKOCA'
        ],
        [
            'DÜZCE', 'CUMAYERİ'
        ],
        [
            'DÜZCE', 'ÇİLİMLİ'
        ],
        [
            'DÜZCE', 'GÖLYAKA'
        ],
        [
            'DÜZCE', 'GÜMÜŞOVA'
        ],
        [
            'DÜZCE', 'KAYNAŞLI'
        ],
        [
            'DÜZCE', 'YIĞILCA'
        ],
        [
            'AYDIN', 'EFELER'
        ],
        [
            'BALIKESİR', 'KARESİ'
        ],
        [
            'BALIKESİR', 'ALTIEYLÜL'
        ],
        [
            'DENİZLİ', 'MERKEZEFENDİ'
        ],
        [
            'HATAY', 'ANTAKYA'
        ],
        [
            'HATAY', 'DEFNE'
        ],
        [
            'HATAY', 'ARSUZ'
        ],
        [
            'HATAY', 'PAYAS'
        ],
        [
            'MANİSA', 'ŞEHZADELER'
        ],
        [
            'MANİSA', 'YUNUSEMRE'
        ],
        [
            'KAHRAMANMARAŞ', 'DULKADİROĞLU'
        ],
        [
            'KAHRAMANMARAŞ', 'ONİKİŞUBAT'
        ],
        [
            'MARDİN', 'ARTUKLU'
        ],
        [
            'MUĞLA', 'MENTEŞE'
        ],
        [
            'MUĞLA', 'SEYDİKEMER'
        ],
        [
            'TEKİRDAĞ', 'SÜLEYMANPAŞA'
        ],
        [
            'TEKİRDAĞ', 'KAPAKLI'
        ],
        [
            'TEKİRDAĞ', 'ERGENE'
        ],
        [
            'TRABZON', 'ORTAHİSAR'
        ],
        [
            'ŞANLIURFA', 'EYYÜBİYE'
        ],
        [
            'ŞANLIURFA', 'HALİLİYE'
        ],
        [
            'ŞANLIURFA', 'KARAKÖPRÜ'
        ],
        [
            'VAN', 'TUŞBA'
        ],
        [
            'VAN', 'İPEKYOLU'
        ],
        [
            'ZONGULDAK', 'KİLİMLİ'
        ],
    ];
}
