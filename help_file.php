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
    <style>
        body {
            text-align: right;
            background-color: #b0bec5;
        }
        .c{
            color:#800000	;
        }

    </style>


</head>
<body>



<div class="container-fluid">
    <div class="row flex-xl-nowrap">
        <div class="col-12 col-md-3 col-xl-2 bd-sidebar">
            <nav class="collapse bd-links  show" id="bd-docs-nav" >

                <div class="row " style="padding-top: 10px;">
                    <h2> المحتويات </h2>
                </div>

                <div class="bd-toc-item active ">
                    <a class="bd-toc-link" href=""> ملف </a>
                        
                            
                </div>
                <div class="bd-toc-item ">
                    <a class="bd-toc-link" href=""> حسابات </a>
                        
                </div>
                <div class="bd-toc-item ">
                    <a class="bd-toc-link" href=""> مواد </a>
                       
                </div>
                <div class="bd-toc-item ">
                    <a class="bd-toc-link" href=""> سندات </a>
                        
                </div>
                <div class="bd-toc-item ">
                    <a class="bd-toc-link" href=""> الأصناف </a>
                </div>
                
                <div class="bd-toc-item ">
                    <a class="bd-toc-link" href=""> النسخ الاحتياطي   </a>
                </div>
            </nav>
        </div>
        <main class="col-12 col-md-9 col-xl-8 py-md-3 pl-md-5 bd-content" role="main">
            <div class="file">
                    <h3 class="bd-title" id="content"> ملف </h3>
                    <p class="bd-lead">

                   </p>
                    <table>
                        <tr>
                            <th style= "width:20%"> فتح ملف </td>
                            <td style="height:30px"> </td>
                        </tr>
                        <tr>
                            <th style= "width:20%"> ملف جديد </td>
                            <td style="height:30px">    </td>
                        </tr>
                        <tr>
                            <th style= "width:20%"> الاستيراد  </td>
                            <td style="height:30px" > 
                        تستخدم هذه النافذة من أجل استيراد الفواتير ,السندات ,المواد والأوراق المالية
                        إلى غيرها ضمن فروع الشركة لمعرفة الحركات التي تمت في هذه الفروع والعكس
                                <p> نستطيع طلب (استيراد من ملف) من القائمة-->ملف -->استيراد</p>
                            </td>
                        </tr>
                        <tr>
                            <th style= "width:20%"> النسخ الاحتياطي  </td>
                            <td style="height:30px"> 
من الضروري دوماً عمل نسخ احتياطية عن ملفاتك خوفاً من حدوث أخطاء أو من ضياع المعطيات نتيجة انقطاع مفاجئ في التيار الكهربائي أو من حدوث عطل ما نتيجة فيروس
أو حذف الملفات من قبل أحد مستخدمي الحاسب عن طريق الخطأ
حيث يوفر البرنامج طريقة لتخزين النسخ الاحتياطية على سطح المكتب 
                                <p> نستطيع طلب (النسخ الاحتياطي) من القائمة-->ملف -->النسخ الاحتياطي</p>
                            </td>
                        </tr>
                    </table>
                    <p>
                    <h6 class="c">   محتويات نافذة فتح ملف : </h6>
                    <B class="c"> الحقول :</B>
                    
                        <table>
                            <tr>
                                <th style= "width:20%">  اسم قاعدة البيانات </td>
                                <td style="height:30px">
                                                                     
                                </td>
                            </tr>
                           
                                                    
                        </table>

                    <B class="c"> الأزرار :</B>

                    <table>
                        <tr>
                            <th>
                                     فتح       
                            </th>
                            <td>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                    جديد         
                            </th>
                            <td>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                    حذف        
                            </th>
                            <td>

                            </td>
                        </tr>
                        
                    </table>
                </p>
            </div>
            <div class="accounts">
                    <h3 class="bd-title" id="content"> حسابات </h3>
                    <p class="bd-lead">
                    يمكن طلب نافذة بطاقة الحساب لتعريف حسابات جديدة أو استعراض معلومات ل حسابات معرفة 
                    سابقاً من  القائمة--> حسابات
                    </p>
                    <table>
                        <tr>
                            <th style= "width:20%"> بطاقة حساب </td>
                            <td style="height:30px">
                            من خلال بطاقة الحساب هذه تستطيع تعريف أو استعراض المعلومات الأساسية عن زبائنك أو مورديك
                            كالبيانات الشخصية ,الرصيد الحالي لهذا الزبون,...الخ
                                <p>  
                                    حيث يتم طلب هذه البطاقة من القائمة-->حسابات-->بطاقة حساب
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <th style= "width:20%"> كشف حساب </td>
                            <td style="height:30px"> يستخدم هذا الزر لاستعراض معلومات حساب معين وفق تاريخ ما </td>
                        </tr>
                        <tr>
                            <th style= "width:20%"> قائمة حسابات </td>
                            <td style="height:30px"> 
                                 يتم عرض معلومات جميع الحسابات الموجودة 
                            </td>
                        </tr>
                    </table>
                    <p>
                    <h6 class="c">  محتويات نافذة بطاقة حساب: </h6>
                    <b>معلومات الحساب </b>
                    <B class="c"> حقولها :</B>
                    
                        <table>
                            <tr>
                                <th style= "width:20%">  رمز الحساب </td>
                                <td style="height:30px">
                                    رقم ترتيبي فريد يعطى للحساب                                 
                                </td>
                            </tr>
                            <tr>
                                <th style= "width:10%" >  الحساب </td>
                                <td style="height:30px"> 
            في هذه الخانة عليك إدخال اسم الزبون أو المورد الذي تقوم بتعريف بطاقة له       
                                </td>
                            </tr>
                            <tr>
                                <th style= "width:10%" >  الحساب الرئيسي </td>
                                <td style="height:30px"> 
                                       
                        (حيث في هذه الحالة يتم تحديد اسم الحساب الرئيسي الذي سيتبع له)تحديد إن كان حساب رئيسي أو فرعي تابع لحساب آخر 
                                </td>
                            </tr>
                           
                        </table>
                    <b> الرصيد الافتتاحي  </b>
                    <B class="c"> حقولها :</B>
                        <table>
                            <tr>
                                <th style= "width:20%">  مدين  </td>
                                <td style="height:30px">
                    المبلغ المدين الذي يتم وضعه كرصيد افتتاحي 
                                </td>
                            </tr>
                            <tr>
                                <th style= "width:10%" >  دائن </td>
                                <td style="height:30px"> 
                    المبلغ الدائن الذي يتم وضعه كرصيد افتتاحي 
                                </td>
                            </tr>
                        </table>
                    <b> معلومات التواصل  </b>
                    <B class="c"> حقولها :</B>
                    
                        <table>
                            <tr>
                                <th style= "width:20%">  المحافظة  </td>
                                <td style="height:30px">
                                في هذه الخانة عليك إدخال اسم المحافظة التي يسكن فيها الزبون أو المورد الذي تقوم بتعريف بطاقة له       

                                </td>
                            </tr>
                            <tr>
                                <th style= "width:10%" >  المدينة </td>
                                <td style="height:30px"> 
                                في هذه الخانة عليك إدخال اسم المدينة التي يسكن فيها الزبون أو المورد الذي تقوم بتعريف بطاقة له       

                                </td>
                            </tr>
                            <tr>
                                <th style= "width:10%" >  مكان السكن </td>
                                <td style="height:30px"> 
                                في هذه الخانة عليك إدخال مكان السكن بالتحديد للزبون أو المورد الذي تقوم بتعريف بطاقة له       
                                </td>
                            </tr>
                            <tr>
                                <th style= "width:10%" >  الهاتف </td>
                                <td style="height:30px"> 
                                في هذه الخانة عليك إدخال رقم الهاتف للزبون أو المورد الذي تقوم بتعريف بطاقة له       
                                </td>
                            </tr>
                            <tr>
                                <th style= "width:10%" >  ملاحظات </td>
                                <td style="height:30px"> 

                                </td>

                            </tr>
                           
                        </table>

                    <B class="c"> الأزرار :</B>

                    <table>
                        <tr>
                            <th>
                                    إضافة       
                            </th>
                            <td>
                    يستخدم هذا الزر لتخزين المعلومات الحالية في النافذة كبطاقة للزبون المحدد 
                            </td>
                        </tr>
                        <tr>
                            <th>
                                    تعديل       
                            </th>
                            <td>
                            يستخدم هذا الزر لتعديل معلومات بطاقة الزبون الحالي    
                            </td>
                        </tr>
                        <tr>
                            <th>
                                    حذف       
                            </th>
                            <td>
                            يستخدم هذا الزر لحذف بطاقة الزبون الحالي    
                            </td>
                        </tr>
                        <tr>
                            <th>
                                    إغلاق       
                            </th>
                            <td>

                            </td>
                        </tr>
                        
                    </table>
                </p>
                <p>
                    <h6 class="c">  محتويات نافذة كشف حساب: </h6>
                    <B class="c"> الحقول :</B>
                    
                        <table>
                            <tr>
                                <th style= "width:20%">  الحساب  </td>
                                <td style="height:30px">

                                </td>
                            </tr>
                            <tr>
                                <th style= "width:10%" >  العملة  </td>
                                <td style="height:30px"> 

                                </td>
                            </tr>
                            <tr>
                                <th style= "width:10%">  التاريخ </td>
                                <td style="height:30px">

                                </td>
                            </tr>  
                            <tr>
                                <th style= "width:10%">  التقرير </td>
                                <td style="height:30px">
                                                              
                                </td>
                            </tr>
                            <tr>
                                <th style= "width:10%">  مجموع مدين </td>
                                <td style="height:30px">
                                                               
                                </td>
                            </tr>    
                            <tr>
                                <th style= "width:10%">  مجموع دائن </td>
                                <td style="height:30px">
                                                              
                                </td>
                            </tr> 
                            <tr>
                                <th style= "width:10%">   المجموع </td>
                                <td style="height:30px">
                                                              
                                </td>
                            </tr>                                 
                        </table>

                    <B class="c"> الأزرار :</B>

                    <table>
                        <tr>
                            <th>
                                    معاينة       
                            </th>
                            <td>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                    طباعة       
                            </th>
                            <td>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                    إغلاق       
                            </th>
                            <td>

                            </td>
                        </tr>
                        
                    </table>
                </p>
                <p>
                    <h6 class="c">   محتويات نافذة قائمة الحسابات : </h6>
                    <B class="c"> الحقول :</B>
                    
                        <table>
                            <tr>
                                <th style= "width:20%">    </td>
                                <td style="height:30px">
                                </td>
                            </tr>
                            <tr>
                                <th style= "width:10%" >  </td>
                                <td style="height:30px"> 
                                </td>
                            </tr>
                            <tr>
                                <th style= "width:10%">  </td>
                                <td style="height:30px">
                                                               
                                </td>
                            </tr>
                            <tr>
                                <th style= "width:10%">  ف </td>
                                <td style="height:30px">
                                </td>
                            </tr>  
                            <tr>
                                <th style= "width:10%">  </td>
                                <td style="height:30px">
                                </td>
                            </tr>                            
                        </table>

                    <B class="c"> الأزرار :</B>

                    <table>
                        <tr>
                            <th>
                                     بحث       
                            </th>
                            <td>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                    حساب جديد       
                            </th>
                            <td>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                    إغلاق       
                            </th>
                            <td>

                            </td>
                        </tr>
                        
                    </table>
                </p>

            </div>

            <div class="items">
                <h3 class="bd-title" id="content"> مواد </h3>
                <p class="bd-lead">
                يمكن طلب نافذة بطاقة المادة لتعريف مواد و أصناف جديدة  
                </p>
                <table >
                    <tr>
                        <th style= "width:10%">  بطاقة صنف  </td>
                        <td style="height:30px">   
                             يستخدم هذا الزر لإنشاء بطاقة لصنف معين , حيث تحوي هذه الصفحة معلومات عن رمز واسم الصنف
                        </td>
                    </tr>
                    <tr>
                        <th style= "width:10%"> بطاقة مادة </td>
                        <td style="height:30px">
                        يجب عليك إدخال بطاقة لكل مادة تتعامل معها في عمليات البيع والشراء ويتم إدخال بطاقات المواد عن طريق نافذة بطاقة التي يمكن طلبها من القائمة -->مواد-->بطاقة مادة
                         يستخدم هذا الزر لإنشاء بطاقة لمادة معينة, حيث تحوي هذه الصفحة معلومات عن اسم 
                             و رمز المادة والصنف التي تتبع له بالإضافة لوحدة القياس التي تقاس به
                        </td>
                    </tr>
                    <tr>
                        <th style= "width:10%"> قائمة مواد </td>
                        <td style="height:30px">

                        </td>
                    </tr>
                </table>
                <p>
                    <h6 class="c">  محتويات نافذة بطاقة صنف: </h6>
                    <B class="c"> الحقول :</B>
                    
                        <table>
                            <tr>
                                <th style= "width:20%">  رمز الصنف </td>
                                <td style="height:30px">
                            هذه الخانة مخصصة لعرض رمز مميز للصنف                                   </td>
                            </tr>
                            <tr>
                                <th style= "width:10%" >  اسم الصنف </td>
                                <td style="height:30px"> 
                                هذه الخانة مخصصة لإدخال اسم الصنف
                                </td>
                            </tr>
                            <tr>
                                <th style= "width:10%">  ملاحظات </td>
                                <td style="height:30px">
                                        هنا يوضع التاريخ الذي تم فيه استلام هذا المبلغ                       
                                </td>
                            </tr>                            
                        </table>

                    <B class="c"> الأزرار :</B>

                    <table>
                        <tr>
                            <th>
                                    إضافة       
                            </th>
                            <td>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                    إغلاق       
                            </th>
                            <td>

                            </td>
                        </tr>
                        
                    </table>
                </p>
                <p>
                    <h6 class="c">   محتويات نافذة بطاقة المادة : </h6>
                    <B class="c"> الحقول :</B>
                    
                        <table>
                            <tr>
                                <th style= "width:20%">  رمز المادة </td>
                                <td style="height:30px">
                                    رقم ترتيبي فريد يعطى للإيصال                                 
                                </td>
                            </tr>
                            <tr>
                                <th style= "width:10%" >  اسم المادة </td>
                                <td style="height:30px"> 
                                    هنا تستطيع وضع الحساب الذي سوف يتم إدخال المبلغ فيه (الحساب المدين ), يظهر 
                                    حساب الصندوق بشكل افتراضي ,مع ملاحظة أنك تستطيع تغيير الحساب الافتراضي   
                                </td>
                            </tr>
                            <tr>
                                <th style= "width:10%">  وحدة القياس </td>
                                <td style="height:30px">
                                        هنا يوضع التاريخ الذي تم فيه استلام هذا المبلغ                       
                                </td>
                            </tr>
                            <tr>
                                <th style= "width:10%">   الصنف </td>
                                <td style="height:30px">
                                        هنا يوضع التاريخ الذي تم فيه استلام هذا المبلغ                       
                                </td>
                            </tr>  
                            <tr>
                                <th style= "width:10%">   ملاحظات </td>
                                <td style="height:30px">
                                        هنا يوضع التاريخ الذي تم فيه استلام هذا المبلغ                       
                                </td>
                            </tr>                            
                        </table>

                    <B class="c"> الأزرار :</B>

                    <table>
                        <tr>
                            <th>
                                    استعراض المواد       
                            </th>
                            <td>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                    إضافة       
                            </th>
                            <td>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                    إغلاق       
                            </th>
                            <td>

                            </td>
                        </tr>
                        
                    </table>
                </p>
                <p>
                    <h6 class="c">   محتويات نافذة قائمة المواد : </h6>
                    <B class="c"> الحقول :</B>
                    
                        <table>
                            <tr>
                                <th style= "width:20%">  رمز المادة </td>
                                <td style="height:30px">
                                    رقم ترتيبي فريد يعطى للإيصال                                 
                                </td>
                            </tr>
                            <tr>
                                <th style= "width:10%" >  اسم المادة </td>
                                <td style="height:30px"> 
                                    هنا تستطيع وضع الحساب الذي سوف يتم إدخال المبلغ فيه (الحساب المدين ), يظهر 
                                    حساب الصندوق بشكل افتراضي ,مع ملاحظة أنك تستطيع تغيير الحساب الافتراضي   
                                </td>
                            </tr>
                            <tr>
                                <th style= "width:10%">  وحدة القياس </td>
                                <td style="height:30px">
                                        هنا يوضع التاريخ الذي تم فيه استلام هذا المبلغ                       
                                </td>
                            </tr>
                            <tr>
                                <th style= "width:10%">   الصنف </td>
                                <td style="height:30px">
                                        هنا يوضع التاريخ الذي تم فيه استلام هذا المبلغ                       
                                </td>
                            </tr>  
                            <tr>
                                <th style= "width:10%">   ملاحظات </td>
                                <td style="height:30px">
                                        هنا يوضع التاريخ الذي تم فيه استلام هذا المبلغ                       
                                </td>
                            </tr>                            
                        </table>

                    <B class="c"> الأزرار :</B>

                    <table>
                        <tr>
                            <th>
                                     بحث       
                            </th>
                            <td>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                    صنف جديد       
                            </th>
                            <td>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                    بطاقة مادة       
                            </th>
                            <td>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                    إغلاق       
                            </th>
                            <td>

                            </td>
                        </tr>
                        
                    </table>
                </p>

            </div>

            <div class="bonds">
                <h3 class="bd-title" id="content"> سندات </h3>
                <p class="bd-lead">
                    تستخدم السندات المتوفرة ضمن البرنامج لتدوين العمليات اليومية المختلفة 
                    من قبض أو دفع وما إلى ذلك            
                 </p>

                <table>
                    <tr>
                        <th style= "width:10%" > سند قبض </td>
                        <td style="height:30px"> 
                            يمكنك إدخال الدفعات التي يرسلها لك الزبائن باستخدام سند القبض,  الذي تستطيع الوصول 
                                 إليه من القائمة--> سندات --> سند قبض          
                        </td>
                            
                    </tr>
                    <tr>
                        <th style= "width:10%" > سند دفع </td>
                        <td style="height:30px">


                        يتمّ إدخال المبالغ التي يتمّ إرسالها للموردين أو المصاريف المختلفة باستخدام سند الدفع, الذي  تستطيع الوصول إليه  
                         من القائمة--> سندات --> سند قبض          

                        </td>
                    </tr>
                </table>
                <p>
                    <h6 class="c">  محتويات نافذة سند القبض: </h6>
                    <B class="c"> الحقول :</B>
                    
                        <table>
                            <tr>
                                <th style= "width:20%">  رقم الإيصال </td>
                                <td style="height:30px">
                                    رقم ترتيبي فريد يعطى للإيصال                                 
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
                                    دوّن في هذه الخانة ملاحظات حول إيصال القبض الحالي                     
                                </td>
                            </tr>
                            <tr>
                                <th style= "width:10%">  المجموع </td>
                                <td style="height:30px">
                                                ززززززززززز
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
                                       ضع  فيه المبلغ الذي تم استلامه من الزبون الذي سوف تضع اسم حسابه في حقل الحساب التالي لهذا الحقل  
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
                            <th>
                                    إضافة       
                            </th>
                            <td>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                    إغلاق       
                            </th>
                            <td>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                    طباعة       
                            </th>
                            <td>
                                تستطيع طباعة السند الحالي بالنقر على هذا الزر
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
                                    رقم ترتيبي فريد يعطى للإيصال                                 
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
                                ززززززززززز
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
                            <th>
                                    إضافة       
                            </th>
                            <td>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                    إغلاق       
                            </th>
                            <td>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                    طباعة       
                            </th>
                            <td>
                                تستطيع طباعة السند الحالي بالنقر على هذا الزر
                            </td>
                        </tr>
                    </table>
                </p>
            </div>
            <div class="movment">
                    <h3 class="bd-title" id="content"> حركات </h3>
                    <p class="bd-lead">

                    </p>
                    <table>
                        <tr>
                            <th>  حركة مادة </td>
                            <td>
يستخدم هذا التقرير للحصول على دراسة تفصيلية لفواتير المبيعات و المشتريات  التي تم تحريرها خلال فترة زمنية معينة ولكافة المواد أو مادة 
ما ,ستتضمن هذه الدراسة اسعار الشراء و المبيع والكميات التي تم إدخالها من هذه المواد والكميات التي تم بيعها أو إخراجها ورصيد المادة عند كل حركة 
                            </td>
                        </tr>
                        <tr>
                            <th> حركة كمسيون </td>
                            <td> 

                             </td>
                        </tr>
                        
                    </table>
                    <p>
                    <h6 class="c">   محتويات نافذة حركة مادة : </h6>
                    <B class="c"> الحقول :</B>
                    
                        <table>
                            <tr>
                                <th style= "width:20%">  رمز المادة </td>
                                <td style="height:30px">
                                    رقم ترتيبي فريد يعطى للإيصال                                 
                                </td>
                            </tr>
                            <tr>
                                <th style= "width:10%" >  اسم المادة </td>
                                <td style="height:30px"> 
                                    هنا تستطيع وضع الحساب الذي سوف يتم إدخال المبلغ فيه (الحساب المدين ), يظهر 
                                    حساب الصندوق بشكل افتراضي ,مع ملاحظة أنك تستطيع تغيير الحساب الافتراضي   
                                </td>
                            </tr>
                            <tr>
                                <th style= "width:10%">  وحدة القياس </td>
                                <td style="height:30px">
                                        هنا يوضع التاريخ الذي تم فيه استلام هذا المبلغ                       
                                </td>
                            </tr>
                            <tr>
                                <th style= "width:10%">   الصنف </td>
                                <td style="height:30px">
                                        هنا يوضع التاريخ الذي تم فيه استلام هذا المبلغ                       
                                </td>
                            </tr>  
                            <tr>
                                <th style= "width:10%">   ملاحظات </td>
                                <td style="height:30px">
                                        هنا يوضع التاريخ الذي تم فيه استلام هذا المبلغ                       
                                </td>
                            </tr>                            
                        </table>

                    <B class="c"> الأزرار :</B>

                    <table>
                        <tr>
                            <th>
                                     بحث       
                            </th>
                            <td>
                        للحصول على دراسة تفصيلية لحركة إحدى المواد أو الأصناف أو العملاء ,حدد في هذه 
                                الخانة اسم المادة أو الصنف أو العميل ,حيث سيتم دراسة ماتم تحريره من فواتير خلال فترة زمنية معينه وفقاً لما تم تحديده في في خانة تاريخ البداية والنهاية 
                            </td>
                        </tr>
                        <tr>
                            <th>
                                طباعة   
                            </th>
                            <td>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                    إغلاق       
                            </th>
                            <td>

                            </td>
                        </tr>
                        
                    </table>
                </p>
                <p>
                    <h6 class="c">   محتويات نافذة حركة كمسيون : </h6>
                    <B class="c"> الحقول :</B>
                    
                        <table>
                            <tr>
                                <th style= "width:20%">  رمز المادة </td>
                                <td style="height:30px">
                                    رقم ترتيبي فريد يعطى للإيصال                                 
                                </td>
                            </tr>
                            <tr>
                                <th style= "width:10%" >  اسم المادة </td>
                                <td style="height:30px"> 
                                    هنا تستطيع وضع الحساب الذي سوف يتم إدخال المبلغ فيه (الحساب المدين ), يظهر 
                                    حساب الصندوق بشكل افتراضي ,مع ملاحظة أنك تستطيع تغيير الحساب الافتراضي   
                                </td>
                            </tr>
                            <tr>
                                <th style= "width:10%">  وحدة القياس </td>
                                <td style="height:30px">
                                        هنا يوضع التاريخ الذي تم فيه استلام هذا المبلغ                       
                                </td>
                            </tr>
                            <tr>
                                <th style= "width:10%">   الصنف </td>
                                <td style="height:30px">
                                        هنا يوضع التاريخ الذي تم فيه استلام هذا المبلغ                       
                                </td>
                            </tr>  
                            <tr>
                                <th style= "width:10%">   ملاحظات </td>
                                <td style="height:30px">
                                        هنا يوضع التاريخ الذي تم فيه استلام هذا المبلغ                       
                                </td>
                            </tr>  
                            <tr>
                            <th style= "width:10%">
                                    إجمالي الفواتير        
                            </th>
                            <td style="height:30px">
                            عرض القيمة المالية الإجمالية للفواتير
                            </td>
                        </tr>
                        <tr>
                            <th style= "width:10%">
                                    قيمة الكمسيون       
                            </th>
                            <td style="height:30px">
                        يتم تحديد قيمة الكمسيون المراد حسمها من القيمة الإجمالية للفواتير
                            </td>
                        </tr>
                        <tr>
                            <th style= "width:10%">
                                    صافي الفواتير       
                            </th>
                            <td style="height:30px">
                            عرض القيمة المالية للفواتير بعد إنقاص قيمة الكمسيون من القيمة الإجمالية للفواتير

                            </td>
                        </tr>                          
                        </table>

                    <B class="c"> الأزرار :</B>

                    <table>
                        <tr>
                            <th>
                                     بحث       
                            </th>
                            <td>
                        للحصول على دراسة تفصيلية لحركة إحدى المواد أو الأصناف أو العملاء ,حدد في هذه 
                                الخانة اسم المادة أو الصنف أو العميل ,حيث سيتم دراسة ماتم تحريره من فواتير خلال فترة زمنية معينه وفقاً لما تم تحديده في في خانة تاريخ البداية والنهاية 
                            </td>
                        </tr>
                       
                        <tr>
                            <th>
                                    طباعة       
                            </th>
                            <td>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                    إغلاق       
                            </th>
                            <td>

                            </td>
                        </tr>
                        
                    </table>
                </p>

            </div>
        </main>
    
        

    </div>

</div>





    

    


                    


</body>
</html>



<?php
include('include/footer.php');
?>