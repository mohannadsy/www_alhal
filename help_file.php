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
                            <th> فتح ملف </td>
                            <td> يستخدم هذا الزر لإنشاء حساب جديد لزبون </td>
                        </tr>
                        <tr>
                            <th> ملف جديد </td>
                            <td> يستخدم هذا الزر لاستعراض معلومات حساب معين وفق تاريخ ما </td>
                        </tr>
                        <tr>
                            <th> الاستيراد  </td>
                            <td> 

                            </td>
                        </tr>
                        <tr>
                            <th> النسخ الاحتياطي  </td>
                            <td> 

                            </td>
                        </tr>
                    </table>

            </div>
            <div class="accounts">
                    <h3 class="bd-title" id="content"> حسابات </h3>
                    <p class="bd-lead">
                    يمكن طلب نافذة بطاقة الحساب لتعريف حسابات جديدة أو استعراض معلومات ل حسابات معرفة 
                    سابقاً من  القائمة--> حسابات
                    </p>
                    <table>
                        <tr>
                            <th> بطاقة حساب </td>
                            <td> يستخدم هذا الزر لإنشاء حساب جديد لزبون </td>
                        </tr>
                        <tr>
                            <th> كشف حساب </td>
                            <td> يستخدم هذا الزر لاستعراض معلومات حساب معين وفق تاريخ ما </td>
                        </tr>
                        <tr>
                            <th> قائمة حسابات </td>
                            <td> 

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
                                <th style= "width:10%" >  الحساب الرئيسي </td>
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

            </div>

            <div class="items">
                <h3 class="bd-title" id="content"> مواد </h3>
                <p class="bd-lead">
                يمكن طلب نافذة بطاقة المادة لتعريف مواد و أصناف جديدة  
                </p>
                <table >
                    <tr>
                        <th style= "width:10%">  إنشاء صنف  </td>
                        <td style="height:30px">   
                             يستخدم هذا الزر لإنشاء بطاقة لصنف معين , حيث تحوي هذه الصفحة معلومات عن رمز واسم الصنف
                        </td>
                    </tr>
                    <tr>
                        <th style= "width:10%"> إنشاء مادة </td>
                        <td style="height:30px">
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
            <div class="accounts">
                    <h3 class="bd-title" id="content"> حركات </h3>
                    <p class="bd-lead">

                    </p>
                    <table>
                        <tr>
                            <th>  حركة مادة </td>
                            <td>

                        </td>
                        </tr>
                        <tr>
                            <th> حركة كمسيون </td>
                            <td> 

                             </td>
                        </tr>
                        
                    </table>

            </div>
        </main>
    
        

    </div>

</div>





    

    


                    


</body>
</html>



<?php
include('include/footer.php');
?>