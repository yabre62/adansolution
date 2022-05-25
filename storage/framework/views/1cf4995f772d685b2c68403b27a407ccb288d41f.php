<?php $__env->startSection('title','Language'); ?>

<?php $__env->startPush('css_or_js'); ?>
    <link href="<?php echo e(asset('public/assets/select2/css/select2.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/assets/back-end/css/custom.css')); ?>" rel="stylesheet">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <!-- Page Heading -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard.index')); ?>"><?php echo e(trans('messages.Dashboard')); ?></a>
                </li>
                <li class="breadcrumb-item" aria-current="page"><?php echo e(trans('messages.language_setting')); ?> for App</li>
            </ol>
        </nav>

        <div class="row" style="margin-top: 20px">
            <div class="col-md-12">
                <div class="alert alert-warning sticky-top" id="alert_box" style="display:none;">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    <strong>Warning!</strong> Follow the documentation to setup from app end, <a
                        href="https://documentation.6amtech.com/sixvalley-ecommerce/docs/1.0/app-setup#section3" target="_blank">click
                        here</a>.
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Select Languages for <?php echo e(trans('messages.product')); ?> <?php echo e(trans('messages.and')); ?> <?php echo e(trans('messages.category')); ?></h4>
                        <label class="badge badge-danger">* For mobile app only</label>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(route('admin.business-settings.web-config.update-language')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <?php ($language=\App\Model\BusinessSetting::where('type','pnc_language')->first()); ?>
                            <?php ($language = json_decode($language->value,true) ?? []); ?>

                            <div class="form-group">
                                <select name="language[]" id="language" onchange="$('#alert_box').show();"
                                        data-maximum-selection-length="3" class="form-control js-select2-custom"
                                        required multiple=true>
                                    <option value="en" <?php echo e(in_array('en',$language)?'selected':''); ?>>English(default)</option>
                                    <option value="af" <?php echo e(in_array('af',$language)?'selected':''); ?>>Afrikaans</option>
                                    <option value="sq" <?php echo e(in_array('sq',$language)?'selected':''); ?>>Albanian - shqip</option>
                                    <option value="am" <?php echo e(in_array('am',$language)?'selected':''); ?>>Amharic - አማርኛ</option>
                                    <option value="ar" <?php echo e(in_array('ar',$language)?'selected':''); ?>>Arabic - العربية</option>
                                    <option value="an" <?php echo e(in_array('an',$language)?'selected':''); ?>>Aragonese - aragonés</option>
                                    <option value="hy" <?php echo e(in_array('hy',$language)?'selected':''); ?>>Armenian - հայերեն</option>
                                    <option value="ast" <?php echo e(in_array('ast',$language)?'selected':''); ?>>Asturian - asturianu</option>
                                    <option value="az" <?php echo e(in_array('az',$language)?'selected':''); ?>>Azerbaijani - azərbaycan dili</option>
                                    <option value="eu" <?php echo e(in_array('eu',$language)?'selected':''); ?>>Basque - euskara</option>
                                    <option value="be" <?php echo e(in_array('be',$language)?'selected':''); ?>>Belarusian - беларуская</option>
                                    <option value="bn" <?php echo e(in_array('bn',$language)?'selected':''); ?>>Bengali - বাংলা</option>
                                    <option value="bs" <?php echo e(in_array('bs',$language)?'selected':''); ?>>Bosnian - bosanski</option>
                                    <option value="br" <?php echo e(in_array('br',$language)?'selected':''); ?>>Breton - brezhoneg</option>
                                    <option value="bg" <?php echo e(in_array('bg',$language)?'selected':''); ?>>Bulgarian - български</option>
                                    <option value="ca" <?php echo e(in_array('ca',$language)?'selected':''); ?>>Catalan - català</option>
                                    <option value="ckb" <?php echo e(in_array('ckb',$language)?'selected':''); ?>>Central Kurdish - کوردی (دەستنوسی عەرەبی)</option>
                                    <option value="zh" <?php echo e(in_array('zh',$language)?'selected':''); ?>>Chinese - 中文</option>
                                    <option value="zh-HK" <?php echo e(in_array('zh-HK',$language)?'selected':''); ?>>Chinese (Hong Kong) - 中文（香港）</option>
                                    <option value="zh-CN" <?php echo e(in_array('zh-CN',$language)?'selected':''); ?>>Chinese (Simplified) - 中文（简体）</option>
                                    <option value="zh-TW" <?php echo e(in_array('zh-TW',$language)?'selected':''); ?>>Chinese (Traditional) - 中文（繁體）</option>
                                    <option value="co" <?php echo e(in_array('co',$language)?'selected':''); ?>>Corsican</option>
                                    <option value="hr" <?php echo e(in_array('hr',$language)?'selected':''); ?>>Croatian - hrvatski</option>
                                    <option value="cs" <?php echo e(in_array('cs',$language)?'selected':''); ?>>Czech - čeština</option>
                                    <option value="da" <?php echo e(in_array('da',$language)?'selected':''); ?>>Danish - dansk</option>
                                    <option value="nl" <?php echo e(in_array('nl',$language)?'selected':''); ?>>Dutch - Nederlands</option>
                                    <option value="en-AU" <?php echo e(in_array('en-AU',$language)?'selected':''); ?>>English (Australia)</option>
                                    <option value="en-CA" <?php echo e(in_array('en-CA',$language)?'selected':''); ?>>English (Canada)</option>
                                    <option value="en-IN" <?php echo e(in_array('en-IN',$language)?'selected':''); ?>>English (India)</option>
                                    <option value="en-NZ" <?php echo e(in_array('en-NZ',$language)?'selected':''); ?>>English (New Zealand)</option>
                                    <option value="en-ZA" <?php echo e(in_array('en-ZA',$language)?'selected':''); ?>>English (South Africa)</option>
                                    <option value="en-GB" <?php echo e(in_array('en-GB',$language)?'selected':''); ?>>English (United Kingdom)</option>
                                    <option value="en-US" <?php echo e(in_array('en-US',$language)?'selected':''); ?>>English (United States)</option>
                                    <option value="eo" <?php echo e(in_array('eo',$language)?'selected':''); ?>>Esperanto - esperanto</option>
                                    <option value="et" <?php echo e(in_array('et',$language)?'selected':''); ?>>Estonian - eesti</option>
                                    <option value="fo" <?php echo e(in_array('fo',$language)?'selected':''); ?>>Faroese - føroyskt</option>
                                    <option value="fil" <?php echo e(in_array('fil',$language)?'selected':''); ?>>Filipino</option>
                                    <option value="fi" <?php echo e(in_array('fi',$language)?'selected':''); ?>>Finnish - suomi</option>
                                    <option value="fr" <?php echo e(in_array('fr',$language)?'selected':''); ?>>French - français</option>
                                    <option value="fr-CA" <?php echo e(in_array('fr-CA',$language)?'selected':''); ?>>French (Canada) - français (Canada)</option>
                                    <option value="fr-FR" <?php echo e(in_array('fr-FR',$language)?'selected':''); ?>>French (France) - français (France)</option>
                                    <option value="fr-CH" <?php echo e(in_array('fr-CH',$language)?'selected':''); ?>>French (Switzerland) - français (Suisse)</option>
                                    <option value="gl" <?php echo e(in_array('gl',$language)?'selected':''); ?>>Galician - galego</option>
                                    <option value="ka" <?php echo e(in_array('ka',$language)?'selected':''); ?>>Georgian - ქართული</option>
                                    <option value="de" <?php echo e(in_array('de',$language)?'selected':''); ?>>German - Deutsch</option>
                                    <option value="de-AT" <?php echo e(in_array('de-AT',$language)?'selected':''); ?>>German (Austria) - Deutsch (Österreich)</option>
                                    <option value="de-DE" <?php echo e(in_array('de-DE',$language)?'selected':''); ?>>German (Germany) - Deutsch (Deutschland)</option>
                                    <option value="de-LI" <?php echo e(in_array('de-LI',$language)?'selected':''); ?>>German (Liechtenstein) - Deutsch (Liechtenstein)</option>
                                    <option value="de-CH" <?php echo e(in_array('de-CH',$language)?'selected':''); ?>>German (Switzerland) - Deutsch (Schweiz)</option>
                                    <option value="el" <?php echo e(in_array('el',$language)?'selected':''); ?>>Greek - Ελληνικά</option>
                                    <option value="gn" <?php echo e(in_array('gn',$language)?'selected':''); ?>>Guarani</option>
                                    <option value="gu" <?php echo e(in_array('gu',$language)?'selected':''); ?>>Gujarati - ગુજરાતી</option>
                                    <option value="ha" <?php echo e(in_array('ha',$language)?'selected':''); ?>>Hausa</option>
                                    <option value="haw" <?php echo e(in_array('haw',$language)?'selected':''); ?>>Hawaiian - ʻŌlelo Hawaiʻi</option>
                                    <option value="he" <?php echo e(in_array('he',$language)?'selected':''); ?>>Hebrew - עברית</option>
                                    <option value="hi" <?php echo e(in_array('hi',$language)?'selected':''); ?>>Hindi - हिन्दी</option>
                                    <option value="hu" <?php echo e(in_array('hu',$language)?'selected':''); ?>>Hungarian - magyar</option>
                                    <option value="is" <?php echo e(in_array('is',$language)?'selected':''); ?>>Icelandic - íslenska</option>
                                    <option value="id" <?php echo e(in_array('id',$language)?'selected':''); ?>>Indonesian - Indonesia</option>
                                    <option value="ia" <?php echo e(in_array('ia',$language)?'selected':''); ?>>Interlingua</option>
                                    <option value="ga" <?php echo e(in_array('ga',$language)?'selected':''); ?>>Irish - Gaeilge</option>
                                    <option value="it" <?php echo e(in_array('it',$language)?'selected':''); ?>>Italian - italiano</option>
                                    <option value="it-IT" <?php echo e(in_array('it-IT',$language)?'selected':''); ?>>Italian (Italy) - italiano (Italia)</option>
                                    <option value="it-CH" <?php echo e(in_array('it-CH',$language)?'selected':''); ?>>Italian (Switzerland) - italiano (Svizzera)</option>
                                    <option value="ja" <?php echo e(in_array('ja',$language)?'selected':''); ?>>Japanese - 日本語</option>
                                    <option value="kn" <?php echo e(in_array('kn',$language)?'selected':''); ?>>Kannada - ಕನ್ನಡ</option>
                                    <option value="kk" <?php echo e(in_array('kk',$language)?'selected':''); ?>>Kazakh - қазақ тілі</option>
                                    <option value="km" <?php echo e(in_array('km',$language)?'selected':''); ?>>Khmer - ខ្មែរ</option>
                                    <option value="ko" <?php echo e(in_array('ko',$language)?'selected':''); ?>>Korean - 한국어</option>
                                    <option value="ku" <?php echo e(in_array('ku',$language)?'selected':''); ?>>Kurdish - Kurdî</option>
                                    <option value="ky" <?php echo e(in_array('ky',$language)?'selected':''); ?>>Kyrgyz - кыргызча</option>
                                    <option value="lo" <?php echo e(in_array('lo',$language)?'selected':''); ?>>Lao - ລາວ</option>
                                    <option value="la" <?php echo e(in_array('la',$language)?'selected':''); ?>>Latin</option>
                                    <option value="lv" <?php echo e(in_array('lv',$language)?'selected':''); ?>>Latvian - latviešu</option>
                                    <option value="ln" <?php echo e(in_array('ln',$language)?'selected':''); ?>>Lingala - lingála</option>
                                    <option value="lt" <?php echo e(in_array('lt',$language)?'selected':''); ?>>Lithuanian - lietuvių</option>
                                    <option value="mk" <?php echo e(in_array('mk',$language)?'selected':''); ?>>Macedonian - македонски</option>
                                    <option value="ms" <?php echo e(in_array('ms',$language)?'selected':''); ?>>Malay - Bahasa Melayu</option>
                                    <option value="ml" <?php echo e(in_array('ml',$language)?'selected':''); ?>>Malayalam - മലയാളം</option>
                                    <option value="mt" <?php echo e(in_array('mt',$language)?'selected':''); ?>>Maltese - Malti</option>
                                    <option value="mr" <?php echo e(in_array('mr',$language)?'selected':''); ?>>Marathi - मराठी</option>
                                    <option value="mn" <?php echo e(in_array('mn',$language)?'selected':''); ?>>Mongolian - монгол</option>
                                    <option value="ne" <?php echo e(in_array('ne',$language)?'selected':''); ?>>Nepali - नेपाली</option>
                                    <option value="no" <?php echo e(in_array('no',$language)?'selected':''); ?>>Norwegian - norsk</option>
                                    <option value="nb" <?php echo e(in_array('nb',$language)?'selected':''); ?>>Norwegian Bokmål - norsk bokmål</option>
                                    <option value="nn" <?php echo e(in_array('nn',$language)?'selected':''); ?>>Norwegian Nynorsk - nynorsk</option>
                                    <option value="oc" <?php echo e(in_array('oc',$language)?'selected':''); ?>>Occitan</option>
                                    <option value="or" <?php echo e(in_array('or',$language)?'selected':''); ?>>Oriya - ଓଡ଼ିଆ</option>
                                    <option value="om" <?php echo e(in_array('om',$language)?'selected':''); ?>>Oromo - Oromoo</option>
                                    <option value="ps" <?php echo e(in_array('ps',$language)?'selected':''); ?>>Pashto - پښتو</option>
                                    <option value="fa" <?php echo e(in_array('fa',$language)?'selected':''); ?>>Persian - فارسی</option>
                                    <option value="pl" <?php echo e(in_array('pl',$language)?'selected':''); ?>>Polish - polski</option>
                                    <option value="pt" <?php echo e(in_array('pt',$language)?'selected':''); ?>>Portuguese - português</option>
                                    <option value="pt-BR" <?php echo e(in_array('pt-BR',$language)?'selected':''); ?>>Portuguese (Brazil) - português (Brasil)</option>
                                    <option value="pt-PT" <?php echo e(in_array('pt-PT',$language)?'selected':''); ?>>Portuguese (Portugal) - português (Portugal)</option>
                                    <option value="pa" <?php echo e(in_array('pa',$language)?'selected':''); ?>>Punjabi - ਪੰਜਾਬੀ</option>
                                    <option value="qu" <?php echo e(in_array('qu',$language)?'selected':''); ?>>Quechua</option>
                                    <option value="ro" <?php echo e(in_array('ro',$language)?'selected':''); ?>>Romanian - română</option>
                                    <option value="mo" <?php echo e(in_array('mo',$language)?'selected':''); ?>>Romanian (Moldova) - română (Moldova)</option>
                                    <option value="rm" <?php echo e(in_array('rm',$language)?'selected':''); ?>>Romansh - rumantsch</option>
                                    <option value="ru" <?php echo e(in_array('ru',$language)?'selected':''); ?>>Russian - русский</option>
                                    <option value="gd" <?php echo e(in_array('gd',$language)?'selected':''); ?>>Scottish Gaelic</option>
                                    <option value="sr" <?php echo e(in_array('sr',$language)?'selected':''); ?>>Serbian - српски</option>
                                    <option value="sh" <?php echo e(in_array('sh',$language)?'selected':''); ?>>Serbo-Croatian - Srpskohrvatski</option>
                                    <option value="sn" <?php echo e(in_array('sn',$language)?'selected':''); ?>>Shona - chiShona</option>
                                    <option value="sd" <?php echo e(in_array('sd',$language)?'selected':''); ?>>Sindhi</option>
                                    <option value="si" <?php echo e(in_array('si',$language)?'selected':''); ?>>Sinhala - සිංහල</option>
                                    <option value="sk" <?php echo e(in_array('sk',$language)?'selected':''); ?>>Slovak - slovenčina</option>
                                    <option value="sl" <?php echo e(in_array('sl',$language)?'selected':''); ?>>Slovenian - slovenščina</option>
                                    <option value="so" <?php echo e(in_array('so',$language)?'selected':''); ?>>Somali - Soomaali</option>
                                    <option value="st" <?php echo e(in_array('st',$language)?'selected':''); ?>>Southern Sotho</option>
                                    <option value="es"<?php echo e(in_array('es',$language)?'selected':''); ?>>Spanish - español</option>
                                    <option value="es-AR" <?php echo e(in_array('en-AR',$language)?'selected':''); ?>>Spanish (Argentina) - español (Argentina)</option>
                                    <option value="es-419" <?php echo e(in_array('en-419',$language)?'selected':''); ?>>Spanish (Latin America) - español (Latinoamérica)</option>
                                    <option value="es-MX" <?php echo e(in_array('en-MX',$language)?'selected':''); ?>>Spanish (Mexico) - español (México)</option>
                                    <option value="es-ES" <?php echo e(in_array('en-ES',$language)?'selected':''); ?>>Spanish (Spain) - español (España)</option>
                                    <option value="es-US" <?php echo e(in_array('en-US',$language)?'selected':''); ?>>Spanish (United States) - español (Estados Unidos)</option>
                                    <option value="su" <?php echo e(in_array('su',$language)?'selected':''); ?>>Sundanese</option>
                                    <option value="sw" <?php echo e(in_array('sw',$language)?'selected':''); ?>>Swahili - Kiswahili</option>
                                    <option value="sv" <?php echo e(in_array('sv',$language)?'selected':''); ?>>Swedish - svenska</option>
                                    <option value="tg" <?php echo e(in_array('tg',$language)?'selected':''); ?>>Tajik - тоҷикӣ</option>
                                    <option value="ta" <?php echo e(in_array('ta',$language)?'selected':''); ?>>Tamil - தமிழ்</option>
                                    <option value="tt" <?php echo e(in_array('tt',$language)?'selected':''); ?>>Tatar</option>
                                    <option value="te" <?php echo e(in_array('te',$language)?'selected':''); ?>>Telugu - తెలుగు</option>
                                    <option value="th" <?php echo e(in_array('th',$language)?'selected':''); ?>>Thai - ไทย</option>
                                    <option value="ti" <?php echo e(in_array('ti',$language)?'selected':''); ?>>Tigrinya - ትግርኛ</option>
                                    <option value="to" <?php echo e(in_array('to',$language)?'selected':''); ?>>Tongan - lea fakatonga</option>
                                    <option value="tr" <?php echo e(in_array('tr',$language)?'selected':''); ?>>Turkish - Türkçe</option>
                                    <option value="tk" <?php echo e(in_array('tk',$language)?'selected':''); ?>>Turkmen</option>
                                    <option value="tw" <?php echo e(in_array('tw',$language)?'selected':''); ?>>Twi</option>
                                    <option value="uk" <?php echo e(in_array('uk',$language)?'selected':''); ?>>Ukrainian - українська</option>
                                    <option value="ur" <?php echo e(in_array('ur',$language)?'selected':''); ?>>Urdu - اردو</option>
                                    <option value="ug" <?php echo e(in_array('ug',$language)?'selected':''); ?>>Uyghur</option>
                                    <option value="uz" <?php echo e(in_array('uz',$language)?'selected':''); ?>>Uzbek - o‘zbek</option>
                                    <option value="vi" <?php echo e(in_array('vi',$language)?'selected':''); ?>>Vietnamese - Tiếng Việt</option>
                                    <option value="wa" <?php echo e(in_array('wa',$language)?'selected':''); ?>>Walloon - wa</option>
                                    <option value="cy" <?php echo e(in_array('cy',$language)?'selected':''); ?>>Welsh - Cymraeg</option>
                                    <option value="fy" <?php echo e(in_array('fy',$language)?'selected':''); ?>>Western Frisian</option>
                                    <option value="xh" <?php echo e(in_array('xh',$language)?'selected':''); ?>>Xhosa</option>
                                    <option value="yi" <?php echo e(in_array('yi',$language)?'selected':''); ?>>Yiddish</option>
                                    <option value="yo" <?php echo e(in_array('yo',$language)?'selected':''); ?>>Yoruba - Èdè Yorùbá</option>
                                    <option value="zu" <?php echo e(in_array('zu',$language)?'selected':''); ?>>Zulu - isiZulu</option>
                                </select>
                            </div>
                            <button type="submit"
                                    class="btn btn-primary float-right ml-3"><?php echo e(trans('messages.Save')); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jj/Desktop/MrZ/WebVision/AdamG/Admin/resources/views/admin-views/business-settings/language/index-app.blade.php ENDPATH**/ ?>