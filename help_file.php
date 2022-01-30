<?php
include('include/nav.php');
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styles/help_file.css">
</head>

<body>
    <div class="sidebar">
      <div class="active" id="file_sidebar" >ملف</div>
      <div id="account_sidebar" >حسابات</div>
      <div id="item_sidebar" >مواد</div>
      <div id="category_sidebar" >الأصناف</div>
      <div id="bills_sidebar" >فواتير</div>
      <div id="bonds_sidebar" >سندات</div>
      <div id="setting_sidebar" >الإعدادات</div>
    </div>
<div class="content">   
    <!-- <div class="row flex-xl-nowrap">
        <div class="col-12 col-md-3 col-xl-2 bd-sidebar">
            <nav class="collapse bd-links  show" id="bd-docs-nav" >
                <div class="row " style="padding-top: 10px;">
                    <h2> المحتويات </h2>
                </div>
                <div class="bd-toc-item active ">
                    <a class="bd-toc-link" href="help_file.php#file"> ملف </a>           
                </div>
                <div class="bd-toc-item ">
                    <a class="bd-toc-link" href="help_file.php#accounts"> حسابات </a>  
                </div>
                <div class="bd-toc-item ">
                    <a class="bd-toc-link" href="help_file.php#items"> مواد </a> 
                </div>
                <div class="bd-toc-item ">
                    <a class="bd-toc-link" href="help_file.php#category"> الأصناف </a>
                </div>
                <div class="bd-toc-item ">
                    <a class="bd-toc-link" href="help_file.php#bills"> فواتير </a> 
                </div>
                <div class="bd-toc-item ">
                    <a class="bd-toc-link" href="help_file.php#bonds"> سندات </a>    
                </div>
                <div class="bd-toc-item ">
                    <a class="bd-toc-link" href="help_file.php#movment"> حركات    </a>
                </div>
                <div class="bd-toc-item ">
                    <a class="bd-toc-link" href="help_file.php#setting"> الإعدادات    </a>
                </div>
            </nav>
        </div> -->
        <!-- <main class="col-12 col-md-9 col-xl-8 py-md-3 pl-md-5 bd-content" role="main"> -->
            <section id="file_section">
                <div class="" id="">
                    <h3 class="bd-title" id="content"> ملف </h3>
                    <p class="bd-lead">
                    تتضمن هذه النافذة معلومات عن الملف المنشأ وتاريخ إنشائه وعن قاعدة البيانات ومعلومات عن 
                    النسخ الاحتياطي والاستيراد 
                    يمكن طلب هذه النافذة من القائمة--> ملف
                    </p>
                    <dl>
                        <dt> فتح ملف</dt>
                            <dd>
                                    يمكننا إنشاء ملف جديد أو فتح ملف موجود سابقاً والتعامل معه
                            </dd>
                        <dt>الاستيراد  </dt>
                            <dd>
                            تستخدم هذه النافذة من أجل استيراد الفواتير ,السندات ,المواد والأوراق المالية
                            إلى غيرها ضمن فروع الشركة لمعرفة الحركات التي تمت في هذه الفروع والعكس
                                    نستطيع طلب (استيراد من ملف) من القائمة-->ملف -->استيراد
                            </dd>
                        <dt>النسخ الاحتياطي  </dt>
                            <dd>
                            من الضروري دوماً عمل نسخ احتياطية عن ملفاتك خوفاً من حدوث أخطاء أو من ضياع المعطيات نتيجة انقطاع مفاجئ في التيار الكهربائي
                            أو من حدوث عطل ما نتيجة فيروس أو حذف الملفاتٍ من قبل أحد مستخدمي الحاسب عن طريق الخطأ
                            حيث يوفر البرنامج طريقة لتخزين النسخ الاحتياطية على سطح المكتب 
                                <p>
                                    نستطيع طلب (النسخ الاحتياطي) من القائمة --> ملف -->النسخ الاحتياطي
                                </p>
                            </dd>
                    </dl>
                    <p>
                        <h6 class="c">   محتويات نافذة فتح ملف : </h6>
                        <B class="c"> الحقول :</B>
                            <table>
                                <tr>
                                    <th style= "width:27%">  اسم قاعدة البيانات </th>
                                    <td style="height:30px">
                                    يرجى إدخال اسم قاعدة البيانات التي تريدالتعامل معها               
                                    </td>
                                </tr>                                                    
                            </table>

                        <B class="c"> الأزرار :</B>
                        <table>
                            <tr>
                                <th style= "width:10%">
                                        فتح       
                                </th>
                                <td style="height:30px">
                                هذا الزر مخصص لفتح الملف المحدد سابقاً  والتعامل معه
                                </td>
                            </tr>
                            <tr>
                                <th style= "width:10%">
                                        جديد         
                                </th>
                                <td style="height:30px">
                                    هذا الزر مخصص لإنشاء ملف جديد,  يرجى إدخال اسم الملف المراد إنشاؤه في الخانه
                                    الفارغة ثم الضغط على زر إضافة ليتم إضافته بشكل صحيح
                                </td>
                            </tr>
                            <tr>
                                <th style= "width:10%">
                                        حذف        
                                </th>
                                <td style="height:30px">
                                هذا الزر مخصص لحذف الملف المحدد سابقاً  
                                </td>
                            </tr>
                            
                        </table>
                    </p>
                </div>
            </section>
            <section id="account_section">
                <div class="" id="">
                        <h3 class="bd-title" id="content"> حسابات </h3>
                        <p class="bd-lead">
                        يمكن طلب نافذة بطاقة الحساب لتعريف حسابات جديدة أو استعراض معلومات ل حسابات معرفة 
                        سابقاً من  القائمة--> حسابات
                        </p>
                        <dl>
                            <dt>  بطاقة حساب </dt>
                            <dd>
                            من خلال بطاقة الحساب هذه تستطيع تعريف أو استعراض المعلومات الأساسية عن زبائنك أو مورديك
                                كالبيانات الشخصية ,الرصيد الحالي لهذا الزبون,...الخ
                            </dd>
                            <dt>كشف حساب  </dt>
                            <dd>
                            استعراض معلومات حساب معين وفق تاريخ ما 
                            </dd>
                            <dt> قائمة حسابات   </dt>
                            <dd>
                                يتم عرض معلومات جميع الحسابات الموجودة 
                            </dd>
                        </dl>

                        <p>
                        <h6 class="c">  محتويات نافذة بطاقة حساب: </h6>
                        <b> معلومات الحساب  </b>
                        <B class="c"> حقولها :</B>
                                <table>
                                        <tr>
                                            <th style= "width:12%">  رمز الحساب </td>
                                            <td style="height:30px">
                                            هذه الخانة مخصصة لعرض رمز مميز للحساب
                                            </td>
                                        </tr>
                                        <tr>
                                            <th style= "width:12%" >  الحساب </td>
                                            <td style="height:30px"> 
                                        في هذه الخانة عليك إدخال اسم الزبون أو المورد الذي تقوم بتعريف بطاقة له       
                                            </td>
                                        </tr>
                                        <tr>
                                            <th style= "width:14%" > الحساب الرئيسي </td>
                                            <td style="height:30px"> 
                                            تحديد إن كان حساب رئيسي أو فرعي تابع لحساب آخر 
                                    (حيث في هذه الحالة يتم تحديد اسم الحساب الرئيسي الذي سيتبع له)
                                            </td>
                                        </tr>
                                </table>
                        <b> الرصيد الافتتاحي   </b>
                        <B class="c"> حقولها :</B>
                                <table>
                                    <tr>
                                        <th style= "width:12%">  مدين  </td>
                                        <td style="height:30px">
                            قيمة المبلغ الواجب دفعه لنا نضعه كرصيد افتتاحي مدين
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style= "width:12%" >  دائن </td>
                                        <td style="height:30px"> 
                        قيمة المبلغ الذي يجب أن ندفعه لهذا الحساب نضعه كرصيد افتتاحي دائن
                                        </td>
                                    </tr>
                                </table>
                        <b> معلومات التواصل  </b>
                        <B class="c"> حقولها :</B>
                        
                            <table>
                                <tr>
                                    <th style= "width:12%">  المحافظة  </td>
                                    <td style="height:30px">
                                    في هذه الخانة عليك إدخال اسم المحافظة التي يسكن فيها الزبون أو المورد الذي تقوم بتعريف بطاقة له       

                                    </td>
                                </tr>
                                <tr>
                                    <th style= "width:12%" >  المدينة </td>
                                    <td style="height:30px"> 
                                    في هذه الخانة عليك إدخال اسم المدينة التي يسكن فيها الزبون أو المورد الذي تقوم بتعريف بطاقة له       

                                    </td>
                                </tr>
                                <tr>
                                    <th style= "width:12%" >  مكان السكن </td>
                                    <td style="height:30px"> 
                                    في هذه الخانة عليك إدخال مكان السكن بالتحديد للزبون أو المورد الذي تقوم بتعريف بطاقة له       
                                    </td>
                                </tr>
                                <tr>
                                    <th style= "width:12%" >  الهاتف </td>
                                    <td style="height:30px"> 
                                    في هذه الخانة عليك إدخال رقم الهاتف للزبون أو المورد الذي تقوم بتعريف بطاقة له       
                                    </td>
                                </tr>
                                <tr>
                                    <th style= "width:12%" >  ملاحظات </td>
                                    <td style="height:30px"> 
                                            يعدّ ملء هذا الحقل خياراً غير إجباري, حيث يتيح لك أن تدوّن أي نص تشعر بأنّه ضروري لهذا الحساب  

                                    </td>

                                </tr>
                            
                            </table>

                        <B class="c"> الأزرار :</B>

                        <table>
                            <tr>
                                <th style= "width:12%">
                                        إضافة       
                                </th>
                                <td style="height:30px">
                        يستخدم هذا الزر لتخزين المعلومات الحالية في النافذة كبطاقة الحساب(العميل) المحدد 
                                </td>
                            </tr>
                            <tr>
                                <th style= "width:12%">
                                        تعديل       
                                </th>
                                <td style="height:30px">
                                يستخدم هذا الزر لتعديل معلومات بطاقة الحساب(العميل) الحالي    
                                </td>
                            </tr>
                            <tr>
                                <th style= "width:12%">
                                        حذف       
                                </th>
                                <td style="height:30px">
                                يستخدم هذا الزر لحذف بطاقة الحساب(العميل) الحالي    
                                </td>
                            </tr>
                            <tr>
                                <th style= "width:12%">
                                        إغلاق       
                                </th>
                                <td style="height:30px">
                                يستخدم هذا الزر لغلق بطاقة الحساب(العميل) الحالي    
                                </td>
                            </tr>
                            
                        </table>
                    </p>
                
                        
                    <P>
                        <h6 class="c">   محتويات نافذة كشف حساب : </h6>
                        <P>
                        تضمن هذه النافذة جدول بعدة أعمدة, عن تفاصيل الحسابات المدخلة من اسم الحساب المقابل 
                        وقيمة المبلغ الذي يجب أن ندفعه لهذا الحساب وقيمة المبلغ الواجب دفعه لنا 
                        مع تاريخ كل عملية ورصيد كل حركة

                        </P>
                        <B class="c"> الحقول :</B>
                        <table>
                            <tr>
                                <th style= "width:12%">
                                        الحساب                         
                                </th>
                                <td style="height:30px">
                                للحصول على كشف تفصيلي لحساب معين  ,حدد في هذه الخانة
                                    اسم الحساب المراد عرض بياناته
                                </td>
                            </tr>
                            <tr>
                                <th style= "width:12%">
                                العملة                            
                                </th>
                                <td style="height:30px">
                                هذا الزر مخصص ليتم اختيار العملة التي سوف تتم بها عمليات الشراء والمبيع 
                                </td>
                            </tr>
                            <tr>
                                <th style= "width:18%">
                                    من تاريخ .. إلى تاريخ
                                </th>
                                <td style="height:30px">
                                لدراسة ماتمّ تحريره من حسابات خلال فترة زمنية معينة
                                    حدد في هاتين الخانتين تاريخ بداية ونهاية تلك الفترة    
                                </td>
                            </tr>
                            <tr>
                                <th style= "width:18%">
                                    نوع التقرير                           
                                </th>
                                <td style="height:30px">
                                يوفر لك البرنامج إمكانية الاختيار بين شكلين من أشكال نوافذ التقارير:
                                    <p>
                                        
                                    </p>
                                    <B>
                                    مختصر :
                                    </B>
                                يجمع الخيارات التي تشترك بشيء معين تحت عنوان واحد ويمكن للمستخدم توسيع تلك الخيارات 
                                                                        أو طيها بالنقر على ذلك العنوان                                
                                    <B>
                                    تفصيلي:

                                    </B> 
                                        يعرض كافة الخيارات مرة واحدة
                                </td>

                            </tr>                                    
                            <tr>
                                <th style= "width:12%">
                                مجموع مدين                        
                                </th>
                                <td style="height:30px">
                                يتم عرض مجموع المبالغ المدينة(المبالغ الواجب دفعها لنا من قِبَل هذا الحساب )             
                                </td>
                            </tr>
                            <tr>
                                <th style= "width:12%">
                                مجموع دائن                        
                                </th>
                                <td style="height:30px">
                                يتم عرض مجموع المبالغ الدائنة(المبالغ الواجب دفعها لهذا الحساب )             
                                </td>
                            </tr>
                            <tr>
                                <th style= "width:12%">
                                    المجموع                       
                                </th>
                                <td style="height:30px">
                        مجموع كلّ من الخانتين التاليتين (مجموع مدين) ,(مجموع دائن)
                            </td>
                            </tr>
                    </table>

                        <B class="c"> الأزرار :</B>
                        <table>
                            <tr>
                                <th style= "width:12%">
                                    معاينة              
                                </th>
                                <td style="height:30px">
                                للحصول على دراسة تفصيلية لحساب معين  ,حدد في هذه الخانة
                                    اسم الحساب المراد البحث عنها
                                </td>
                            </tr>
                            <tr>
                                <th style= "width:12%">
                                طباعة                            
                                </th>
                                <td style="height:30px">
                                هذا الزر مخصص لطباعة تقرير موجز لحساب معين وفق الخيارات المحددة       
                                </td>
                            </tr>
                            <tr>
                                <th style= "width:12%">
                                    إغلاق                          
                                </th>
                                <td style="height:30px">
                                هذا الزر مخصص لغلق نافذة كشف حساب 
                                </td>
                            </tr>
                    </table>
                    </p>

                    <P>
                        <h6 class="c">   محتويات نافذة قائمة الحسابات : </h6>
                        <P>
                        تضمن هذه النافذة جدول بعدة أعمدة, عن تفاصيل الحسابات المدخلة من اسم الحساب
                        وقيمة المبلغ الذي يجب أن ندفعه لهذا الحساب وقيمة المبلغ الواجب دفعه لنا 

                        </P>
                        <B class="c"> الأزرار :</B>
                        <table>
                            <tr>
                                <th style= "width:8%">
                                    بحث                            </th>
                                <td style="height:30px">
                                للحصول على دراسة تفصيلية لحساب معين  ,حدد في هذه الخانة
                                    اسم الحساب المراد البحث عنها
                                </td>
                            </tr>
                            <tr>
                                <th style= "width:12%">
                                حساب جديد                           
                                </th>
                                <td style="height:30px">
                                هذا الزر مخصص ليتم نقلنا لواجهة بطاقة حساب لإضافة معلومات حساب جديد
                                </td>
                            </tr>
                            <tr>
                                <th style= "width:8%">
                                    إغلاق                          
                                </th>
                                <td style="height:30px">
                                هذا الزر مخصص لغلق نافذة قائمة الحسابات
                                </td>
                            </tr>
                    </table>
                    </p>
                </div>
            </section>
            <section id="item_section">
                <div class=""  id="">
                    <h3 class="bd-title" id="content"> مواد </h3>
                    <p class="bd-lead">
                    يمكن طلب نافذة مواد  لتعريف مواد و أصناف جديدة  
                    </p>
                    
                        <dl>
                            <dt>بطاقة صنف</dt>
                            <dd>
                            يجب عليك إدخال بطاقة لكل صنف تتعامل معه في عمليات البيع والشراء ويتم إدخال بطاقات الأصناف عن طريق نافذة بطاقة صنف التي يمكن طلبها من القائمة -->مواد-->بطاقة صنف
                        </dd>
                            <dt>بطاقة مادة</dt>
                            <dd>
                            يجب عليك إدخال بطاقة لكل مادة تتعامل معها في عمليات البيع والشراء ويتم إدخال بطاقات المواد عن طريق نافذة بطاقة مادة التي يمكن طلبها من القائمة -->مواد-->بطاقة مادة
                            </dd>
                            <dt>قائمة المواد </dt>
                            <dd>
                            لائحة لعرض كافة المواد 
                            </dd>
                        </dl>
                    <section id="category_section">
                    <p id ="category" >
                        <h6 class="c" >  محتويات نافذة بطاقة صنف: </h6>
                        <B class="c"> الحقول :</B>
                        
                            <table>
                                <tr>
                                    <th style= "width:18%">  رمز الصنف </td>
                                    <td style="height:30px">
                                هذه الخانة مخصصة لعرض رمز مميز للصنف                                   </td>
                                </tr>
                                <tr>
                                    <th style= "width:20%" >  اسم الصنف </td>
                                    <td style="height:30px"> 
                                    هذه الخانة مخصصة لإدخال اسم الصنف
                                    </td>
                                </tr>
                                <tr>
                                    <th style= "width:18%">  ملاحظات </td>
                                    <td style="height:30px">
                                        دون في هذه الخانة ملاحظات حول الصنف الذي تم إدخاله    
                                    </td>
                                </tr>                            
                            </table>

                        <B class="c"> الأزرار :</B>

                        <table>
                            <tr>
                                <th style= "width:18%" >
                                        إضافة       
                                </th>
                                <td style="height:30px">
                            إضافة بيانات الصنف المدخل لقائمة الأصناف
                                </td>
                            </tr>
                            <tr>
                                <th style= "width:18%">
                                        إغلاق       
                                </th>
                                <td style="height:30px">
                                إغلاق نافذة بطاقة صنف
                                </td>
                            </tr>
                            
                        </table>
                    </p>
                    </section>
                    <p>
                        <h6 class="c">   محتويات نافذة بطاقة المادة : </h6>
                        <B class="c"> الحقول :</B>
                            <table>
                                <tr>
                                    <th style= "width:18%">  رمز المادة </td>
                                    <td style="height:30px">
                            هذه الخانة مخصصة لعرض رمز مميز للمادة
                                    </td>
                                </tr>
                                <tr>
                                    <th style= "width:18%" >  اسم المادة </td>
                                    <td style="height:30px">
                                    هذه الخانة مخصصة لإدخال اسم المادة 
                                    </td>
                                </tr>
                                <tr>
                                    <th style= "width:18%">  وحدة القياس </td>
                                    <td style="height:30px">
                                    هذه الخانة مخصصة لإدخال وحدة قياس المادة (غرام-سنتيمتر-قطعة-عبوة...)
                                    </td>
                                </tr>
                                <tr>
                                    <th style= "width:18%">   الصنف </td>
                                    <td style="height:30px">
                                    هذه الخانة مخصصة لإدخال الصنف الذي تتبع له المادة 
                                    </td>
                                </tr>  
                                <tr>
                                    <th style= "width:18%">   ملاحظات </td>
                                    <td style="height:30px">
                                    دون في هذه الخانة ملاحظات حول المادة التي تمّ إدخاله    
                                    </td>
                                </tr>                            
                            </table>

                        <B class="c"> الأزرار :</B>

                        <table>
                            <tr>
                                <th style= "width:20%">
                                        استعراض المواد       
                                </th>
                                <td style="height:30px">
                            ينقلنا لواجهة قائمة المواد لعرض جميع المواد المدخلة
                                </td>
                            </tr>
                            <tr>
                                <th style= "width:18%">
                                        إضافة       
                                </th>
                                <td style="height:30px">
                                إضافة بيانات المادةالمدخلة لقائمةالمواد
                                </td>
                            </tr>
                            <tr>
                                <th style= "width:18%">
                                        إغلاق       
                                </th>
                                <td style="height:30px">
                                إغلاق نافذة بطاقة مادة
                                </td>
                            </tr>
                            
                        </table>
                    </p>

                    <P>
                        <h6 class="c">   محتويات نافذة قائمة المواد : </h6>
                        <P>
                            تضمن هذه النافذة جدول بعدة أعمدة, عن تفاصيل المواد المدخلة من رمز المادة
                            واسم المادة المدخلة باإضافة للصنف الذي تتبع له المادة مع العمليات الموافقة لهذه المادة
                        </P>
                        <B class="c"> الأزرار :</B>
                        <table>
                            <tr>
                                <th style= "width:18%">
                                    بحث                            </th>
                                <td style="height:30px">
                                للحصول على دراسة تفصيلية لمادة معينة  ,حدد في هذه الخلنة
                                    اسم المادة المراد البحث عنها
                                </td>
                            </tr>
                            <tr>
                                <th style= "width:18%">
                                صنف جديد                           
                                </th>
                                <td style="height:30px">
                                هذا الزر مخصص ليتم نقلنا لواجهة بطاقة صنف ليتم إضافة صنف جديد
                                </td>
                            </tr>
                            <tr>
                                <th style= "width:18%">
                                    بطاقة مادة                   
                                </th>
                                <td style="height:30px">
                                هذا الزر مخصص ليتم نقلنا لواجهة بطاقة مادة ليتم إضافة مادة جديدة
                                </td>
                            </tr>
                            <tr>
                                <th style= "width:18%">
                                    إغلاق                          
                                </th>
                                <td style="height:30px">
                                هذا الزر مخصص لغلق نافذة قائمة المواد
                                </td>
                            </tr>
                    </table>
                    
                    </p>

                </div>
            </section>
            <section id="bills_section">
            <div class="" id="">

            </div>
            </section>
            <section id="bonds_section"></section>
            <div class="" id="">
                <h3 class="bd-title" id="content"> سندات </h3>
                <p class="bd-lead">
                    تستخدم السندات المتوفرة ضمن البرنامج لتدوين العمليات اليومية المختلفة 
                    من قبض أو دفع وما إلى ذلك            
                 </p>

                 <dl>
                        <dt>سند قبض</dt>
                        <dd>
                        يمكنك إدخال الدفعات التي يدفعها لك الزبائن باستخدام سند القبض,  الذي تستطيع الوصول 
                                 إليه من القائمة--> سندات --> سند قبض          
                        </dd>
                        <dt>سند دفع</dt>
                        <dd>
                        يمكنك إدخال الدفعات التي يدفعها لك الزبائن باستخدام سند القبض,  الذي تستطيع الوصول 
                                 إليه من القائمة--> سندات --> سند قبض  
                        </dd>
                </dl>
               
                <p>
                    <h6 class="c">  محتويات نافذة سند القبض: </h6>
                    <B class="c"> الحقول :</B>
                    
                        <table>
                            <tr>
                                <th style= "width:20%">  رقم الإيصال </td>
                                <td style="height:30px">
                                يتم  توليد رقم فريد لكل إيصال                               
                                </td>
                            </tr>
                            <tr>
                                <th style= "width:10%" >  الحساب </td>
                                <td style="height:30px"> 
                                    هنا تستطيع وضع الحساب الذي سوف يتم إدخال المبلغ فيه (الحساب المدين ), يظهر 
                                    حساب الصندوق بشكل افتراضي ,مع ملاحظة أنك تستطيع تغيير الحساب الافتراضي   
                                </td>
                            </tr>
                            <tr>
                                <th style= "width:10%">  التاريخ </td>
                                <td style="height:30px">
                                        هنا يوضع التاريخ الذي تم فيه استلام هذا المبلغ                       
                                </td>
                            </tr>
                            <tr>
                                <th style= "width:10%">  العملة </td>
                                <td style="height:30px">
                                    حدّد في هذه الخانة العملة الخاصة بالحساب الرئيسي والذي سيتحرك وفقها هذا الحساب                                   
                                </td>
                            </tr>
                            <tr>
                                <th style= "width:10%">  ملاحظات </td>
                                <td style="height:30px">
                                    دوّن في هذه الخانة ملاحظات حول سند القبض الحالي                     
                                </td>
                            </tr>
                            <tr>
                                <th style= "width:10%">  المجموع </td>
                                <td style="height:30px">
                                        عرض مجموع المبالغ الدائنة الواجب دفعها لهذا الحساب 
                               </td>
                            </tr>
                            <tr>
                                <th style= "width:10%"> جدول الحسابات  </td>
                                <td style="height:30px">
                                        سيظهر في الجدول الأعمدة التي اختيرت في خصائص هذا النمط من السندات وفيه الحقول التالية:                                  
                                
                                </td>
                                    <Table>
                                        <th style= "width:10%">  الرقم </td>
                                        <td style="height:30px"  >
                                            رقم ترتيبي                                  
                                        </td>

                                        <th style= "width:10%">  الدائن </td>
                                        <td style="height:30px">
                                       ضع  فيه المبلغ الذي تم استلامه من العميل الذي سوف تضع اسم حسابه في حقل الحساب التالي لهذا الحقل  
                                        </td>
                                        <th style= "width:10%">  الحساب </td>
                                        <td style="height:30px">
                                         ضع في هذا الحقل اسم الحساب  الذي تم استلام المبلغ منه (الحساب الدائن) 
                                        </td>
                                        <th style= "width:10%">  ملاحظات </td>
                                        <td style="height:30px">
                                         يعدّ ملء هذا الحقل خياراً غير إجباري, حيث يتيح لك أن تدوّن أي نص تشعر بأنّه ضروري لشرح هذه العملية
                                        </td>

                                    </Table>
                            </tr>
                            
                        </table>

                    <B class="c"> الأزرار :</B>

                    <table>
                        <tr>
                            <th style= "width:15%">
                                    إضافة       
                            </th>
                            <td style="height:30px">
                        هذا الزر مخصص لإضافة بيانات سند القبض الحالي 
                            </td>
                        </tr>
                        <tr>
                            <th style= "width:15%">
                                    إغلاق       
                            </th>
                            <td style="height:30px">
                            هذا الزر مخصص لغلق نافذة سند القبض  
                            </td>
                        </tr>
                        <tr>
                            <th style= "width:15%">
                                    طباعة       
                            </th>
                            <td style="height:30px"  >
                                تستطيع طباعة سندالقبض الحالي بالنقر على هذا الزر
                            </td>
                        </tr>
                    </table>
                </p>
                <p>
                    <h6 class="c">  محتويات نافذة سند الدفع: </h6>
                    <B class="c"> الحقول :</B>
                    
                        <table>
                            <tr>
                                <th style= "width:20%">  رقم الإيصال </td>
                                <td style="height:30px">
                                    يتم  توليد رقم فريد لكل إيصال                               
                                    </td>
                            </tr>
                            <tr>
                                <th style= "width:10%" >  الحساب </td>
                                <td style="height:30px"> 
                                تستطيع في هذه الخانة إدخال اسم الحساب الذي تمّ سحب المبلغ منه(الحساب الدائن)  
                                </td  >
                            </tr>
                            <tr>
                                <th style= "width:10%">  التاريخ </td>
                                <td style="height:30px">
                                    حدد في هذه الخانة التاريخ الذي تمّ فيه تسليم هذا المبلغ 
                                </td>
                            </tr>
                            <tr>
                                <th style= "width:10%">  العملة </td>
                                <td style="height:30px">
                                    حدّد في هذه الخانة العملة الخاصة بالحساب الرئيسي والذي سيتحرك وفقها هذا الحساب                                   
                                </td>
                            </tr>
                            <tr>
                                <th style= "width:10%">  ملاحظات </td>
                                <td style="height:30px">
                                    دوّن في هذه الخانة ملاحظات حول إيصال الدفع الحالي                     
                                </td>
                            </tr>
                            <tr>
                                <th style= "width:20%">  المجموع </td>
                                <td style="height:30px">
                                  عرض مجموع المبالغ المدينة الواجب دفعه لنا من قِبَل هذا الحساب            
                                </td>
                            </tr>
                            <tr>
                                <th style= "width:10%"> جدول الحسابات  </td>
                                <td style="height:30px">
                                        سيظهر في الجدول الأعمدة التي اختيرت في خصائص هذا النمط من السندات وفيه الحقول التالية:                                  
                                
                                </td>
                                    <Table>
                                        <th style= "width:10%">  الرقم </td>
                                        <td style="height:30px"  >
                                            رقم ترتيبي                                  
                                        </td>

                                        <th style= "width:10%">  المدين </td>
                                        <td style="height:30px">
                                            ضع في هذا الحقل المبلغ الذي تمّ تسليمه للحساب الذي وضعته في حقل الحساب   
                                       </td>
                                        <th style= "width:10%">  الحساب </td>
                                        <td style="height:30px">
                                        ضع في هذا الحقل اسم الحساب الذي تمّ تسليمه المبلغ (الحساب المدين)    
                                       </td>
                                        <th style= "width:10%">  ملاحظات </td>
                                        <td style="height:30px">
                                         يعدّ ملء هذا الحقل خياراً غير إجباري, حيث يتيح لك أن تدوّن أي نص تشعر بأنّه ضروري لشرح هذه العملية
                                        </td>

                                    </Table>
                            </tr>
                            

                        </table>

                    <B class="c"> الأزرار :</B>
                    <table>
                        <tr>
                            <th  style= "width:15%">
                                    إضافة       
                            </th>
                            <td style="height:30px">
                             هذا الزر مخصص لإضافة بيانات سند الدفع الحالي  
                            </td>
                        </tr>
                        <tr>
                            <th  style= "width:15%">
                                    إغلاق       
                            </th>
                            <td style="height:30px">
                            هذا الزر مخصص لغلق نافذة سند الدفع  
                            </td>
                        </tr>
                        <tr>
                            <th  style= "width:15%">
                                    طباعة       
                            </th>
                            <td style="height:30px">
                                تستطيع طباعة سند الدفع الحالي بالنقر على هذا الزر
                            </td>
                        </tr>
                    </table>
                </p>
            </div>
            <!-- <section id="">
            <div class="movment" id="movment">
                    <h3 class="bd-title" id="content"> حركات </h3>
                    <p class="bd-lead">

                    </p>
                    <dl>
                        <dt>حركة مادة</dt>
                        <dd>
                        تعرض هذه الصفحة تقريراً موجزاً عن حركة المادة المحددة
                        </dd>
                        <dt>حركة كمسيون</dt>
                        <dd>
                        تعرض هذه الصفحة تقريراً موجزاً عن حركة الكمسيون وفقاً لشروط محددة 
                        </dd>
                    </dl>
                   
                    <p>
                    <h6 class="c">   محتويات نافذة حركة مادة : </h6>
                        <P>
                        تضمن هذه النافذة جدول بعدة أعمدة, التاريخ الذي صدرت فيه الفاتورة
                        رقم الفاتورة ويندرج تحته مجمل العمليات الحاصلة على المادةالمحددة من بيع وشراء وإدخالات وإخراجات مع الكمية والسعر الموافقة لكل عملية
                        </P>
                        

                    <B class="c"> الأزرار :</B>

                    <dl>

                        <dt>بحث</dt>
                        <dd>    
                                 للحصول على دراسة تفصيلية لحركة إحدى المواد أو الأصناف أو العملاء ,حدد في هذه 
                                 الخانة اسم المادة أو الصنف أو العميل ,حيث سيتم دراسة ماتم تحريره من فواتير خلال فترة زمنية معينه وفقاً لما تم تحديده في في خانة تاريخ البداية والنهاية 
                        </dd>
                        <dt>طباعة</dt>
                        <dd>
                      هذا الزر مخصص لطباعة تقرير موجز لحركة مادة وفق الخيارات المحددة
                        </dd>
                        <dt>إغلاق</dt>
                        <dd>
                            هذا الزر مخصص لغلق نافذة حركة المادة
                        </dd>
                    </dl>
                    <!--
                        <table>
                        <tr>
                            <th  style= "width:10%">
                                     بحث       
                            </th>
                            <td style="height:30px">
                        للحصول على دراسة تفصيلية لحركة إحدى المواد أو الأصناف أو العملاء ,حدد في هذه 
                                الخانة اسم المادة أو الصنف أو العميل ,حيث سيتم دراسة ماتم تحريره من فواتير خلال فترة زمنية معينه وفقاً لما تم تحديده في في خانة تاريخ البداية والنهاية 
                            </td>
                        </tr>
                        <tr>
                            <th  style= "width:10%">
                                طباعة   
                            </th>
                            <td style="height:30px">
                            طباعة تقرير موجز لحركة وفق المادة المحددة
                            </td>
                        </tr>
                        <tr>
                            <th  style= "width:10%">
                                    إغلاق       
                            </th>
                            <td style="height:30px">
                                إغلاق نافذة حركة المادة
                            </td>
                        </tr>
                    </table>
                -->
                </p>
                <p>
                    <h6 class="c">   محتويات نافذة حركة كمسيون : </h6>
                        <P>
                        تضمن هذه النافذة جدول بعدة أعمدة, عن تفاصيل الفاتورة كاملة من تاريخ إصدار الفاتورة
                        والمواد المباعة مع أسماء العملاء وقيمة الكمسيون الخاصة بهذه العملية
                        </P>
                        <B class="c"> الحقول :</B>
                        <table>
                            <tr>
                            <th style= "width:18%">
                                    إجمالي الفواتير        
                            </th>
                            <td style="height:30px">
                            عرض القيمة المالية الإجمالية للفواتير
                            </td>
                        </tr>
                        <tr>
                            <th style= "width:18%">
                                    قيمة الكمسيون       
                            </th>
                            <td style="height:30px">
                        يتم تحديد قيمة الكمسيون المراد حسمها من القيمة الإجمالية للفواتير
                            </td>
                        </tr>
                        <tr>
                            <th style= "width:18%">
                                    صافي الفواتير       
                            </th>
                            <td style="height:30px">
                            عرض القيمة المالية للفواتير بعد إنقاص قيمة الكمسيون من القيمة الإجمالية للفواتير

                            </td>
                        </tr>                          
                        </table>
                    <B class="c"> الأزرار :</B>
                    <dl>
                        <dt>بحث</dt>
                        <dd>    
                                 للحصول على دراسة تفصيلية لحركة الكمسيون وفقاً لإحدى المواد أو الأصناف أو العملاء ,حدد في هذه 
                                 الخانة اسم المادة أو الصنف أو العميل ,حيث سيتم دراسة ماتم تحريره من فواتير خلال فترة زمنية معينه وفقاً لما تم تحديده في في خانة تاريخ البداية والنهاية 
                        </dd>
                        <dt>طباعة</dt>
                        <dd>
                   هذا الزر مخصص لطباعة تقرير موجز لحركة الكمسيون وفق الخيار المحدد
                        </dd>
                        <dt>إغلاق</dt>
                        <dd>
                           هذا الزر مخصص لغلق نافذة حركة الكمسيون
                        </dd>
                    </dl>
               

            <!-- </div>
            </section>  -->
            <section id="setting_section">
            <div class="" id="">
            </div>
            </section>
            
        <!-- </main> -->
    </div>
</div>

</body>
</html>

<?php
include('include/footer.php');
?>

<script>
  $('#file_sidebar').click(function(){
    $('#file_section').show();
    $('#file_sidebar').prop('class' , 'active');
    
    $('#account_section').hide();
    $('#account_sidebar').removeClass('active');
    $('#item_section').hide();
    $('#item_sidebar').removeClass('active');
    $('#category_section').hide();
    $('#category_sidebar').removeClass('active');
    $('#bills_section').hide();
    $('#bills_sidebar').removeClass('active');
    $('#bonds_section').hide();
    $('#bonds_sidebar').removeClass('active');
    $('#setting_section').hide();
    $('#setting_sidebar').removeClass('active');
  });

  
  $('#account_sidebar').click(function(){
    $('#account_section').show();
    $('#account_sidebar').prop('class' , 'active');

    $('#file_section').hide();
    $('#file_sidebar').removeClass('active');
    $('#item_section').hide();
    $('#item_sidebar').removeClass('active');
    $('#category_section').hide();
    $('#category_sidebar').removeClass('active');
    $('#bills_section').hide();
    $('#bills_sidebar').removeClass('active');
    $('#bonds_section').hide();
    $('#bonds_sidebar').removeClass('active');
    $('#setting_section').hide();
    $('#setting_sidebar').removeClass('active');

  });
  
  $('#item_sidebar').click(function(){
    $('#item_section').show();
    $('#item_sidebar').prop('class' , 'active');

    $('#file_section').hide();
    $('#file_sidebar').removeClass('active');
    $('#account_section').hide();
    $('#account_sidebar').removeClass('active');
    $('#category_section').hide();
    $('#category_sidebar').removeClass('active');
    $('#bills_section').hide();
    $('#bills_sidebar').removeClass('active');
    $('#bonds_section').hide();
    $('#bonds_sidebar').removeClass('active');
    $('#setting_section').hide();
    $('#setting_sidebar').removeClass('active');
  });
  
  $('#category_sidebar').click(function(){
    $('#category_section').show();
    $('#category_sidebar').prop('class' , 'active');

    $('#file_section').hide();
    $('#file_sidebar').removeClass('active');
    $('#account_section').hide();
    $('#account_sidebar').removeClass('active');
    $('#item_section').hide();
    $('#item_sidebar').removeClass('active');
    $('#bills_section').hide();
    $('#bills_sidebar').removeClass('active');
    $('#bonds_section').hide();
    $('#bonds_sidebar').removeClass('active');
    $('#setting_section').hide();
    $('#setting_sidebar').removeClass('active');
  });
  
  $('#bills_sidebar').click(function(){
    $('#bills_section').show();
    $('#bills_sidebar').prop('class' , 'active');

    $('#file_section').hide();
    $('#file_sidebar').removeClass('active');
    $('#account_section').hide();
    $('#account_sidebar').removeClass('active');
    $('#item_section').hide();
    $('#item_sidebar').removeClass('active');
    $('#category_section').hide();
    $('#category_sidebar').removeClass('active');
    $('#bonds_section').hide();
    $('#bonds_sidebar').removeClass('active');
    $('#setting_section').hide();
    $('#setting_sidebar').removeClass('active');
  });
  
  $('#bonds_sidebar').click(function(){
    $('#bonds_section').show();
    $('#bonds_sidebar').prop('class' , 'active');

    
    $('#file_section').hide();
    $('#file_sidebar').removeClass('active');
    $('#account_section').hide();
    $('#account_sidebar').removeClass('active');
    $('#item_section').hide();
    $('#item_sidebar').removeClass('active');
    $('#bills_section').hide();
    $('#bills_sidebar').removeClass('active');
    $('#category_section').hide();
    $('#category_sidebar').removeClass('active');
    $('#setting_section').hide();
    $('#setting_sidebar').removeClass('active');
  });
  
  $('#setting_sidebar').click(function(){
    $('#setting_section').show();
    $('#setting_sidebar').prop('class' , 'active');

    $('#file_section').hide();
    $('#file_sidebar').removeClass('active');
    $('#account_section').hide();
    $('#account_sidebar').removeClass('active');
    $('#item_section').hide();
    $('#item_sidebar').removeClass('active');
    $('#category_section').hide();
    $('#category_sidebar').removeClass('active');
    $('#bills_section').hide();
    $('#bills_sidebar').removeClass('active');
    $('#bonds_section').hide();
    $('#bonds_sidebar').removeClass('active');
   
  });
</script>