<script>

//  this is for cheking if all the fields are valid
 var fieldValidity =false;


function otpGenerator(name) { 
    otp = Math.floor(Math.random()*10000);
    localStorage.setItem(name,otp)
    return otp
    }


function nextBtnToggle ( count) { 

    p = $("a[href='#next']").parent();
    if (count > 0 && fieldValidity == false) {
        // hit False
        p.addClass('disabled');
        $("a[href='#next']").hide()
    } else if(count == 0 && fieldValidity ==true ) {
        // hit True
        p.removeClass('disabled');
        $("a[href='#next']").show()

    }           
}
// First we confirm all fields are filled
function counter () {
    emptyInputs = 0
    $('.check.body.current')[0].getElementsByTagName('input').forEach((input)=>{
         input.value =='' ? emptyInputs +=1 : 'Do Nothing' 
    })
    return emptyInputs

}
// this is for binfing the event en after the current actiive class changes
function binder () {
     $('.check.body.current')[0].getElementsByTagName('input').forEach(input => {
        input.addEventListener('focusout',e=>{
            console.info(counter())
            nextBtnToggle(counter())

        })        
    });
}
//  this will calculate the age
function getAge(d1, d2){
    d2 = d2 || new Date();
    var diff = d2.getTime() - d1.getTime();
    return Math.floor(diff / (1000 * 60 * 60 * 24 * 365.25));
}
// Convertion of A sring to HTMl
function strToHtml (str) {
    const range = document.createRange();
    const conv = range.createContextualFragment(str);
    return conv;
}

// option Loader
function optLoader (cntyElem) {
    // get the value
    cntVal     = cntyElem.value
        // fetch the subcounties which are in an array
        subCounties = countSubs[cntVal]
        // get the target
        target     = cntyElem.getAttribute('target')
        console.log(target)
        // remove all children if any
        target.innerHTML = null
        // loop while adding to the options
        subCounties.forEach(sub=>{
            opt = strToHtml(`<option value="${sub}"> </option>`)
            $(`.${target}`)[0].append(opt)              
        })
}

function fieldValidation (element) {
    modelName = element.getAttribute('target')
    fieldName = element.getAttribute('name')
    value     = element.value
    $.get(`/api/fieldValidator/${modelName}/${fieldName}/${value}`,function(response){
        if (response == 1) {
            element.classList.add('inputError')
            msg = element.nextElementSibling
            msg.style.display = "block"
            fieldValidity =false
        } else {
            element.classList.remove('inputError')
            msg = element.nextElementSibling
            msg.style.display = "none"
            fieldValidity=true
        }
    })
}

function mpesaStk(phoneNumber,idNumber) {
    toastr.info('Processing...')
    $.get(`/api/v1/mpesatest/stk/push/${idNumber}/${phoneNumber}`,function (response) { 
        if (response['ResponseCode'] == 0) {
            toastr.warning('STK request pushed, Please Enter YOur Pin.')
        } else {
            toastr.danger('There was an error in processing your Request.')
        }
     })
}




// this is for the confirmation page
$(document).ready(function () {
    // field to be validated
    fieldVs = $('.fieldValidate')
    fieldVsKys = Object.keys(fieldVs)
    // remove the last 2 last keys
    x = 0
    while( x < 2){
        fieldVsKys.pop()
        x+=1
    }
    // Loop
    fieldVsKys.forEach(key=>{
        fieldVs[key].addEventListener('focusout',event=>{
            console.log(fieldVs[key])
            fieldValidation(fieldVs[key])
        })
    })


    // loading the varios counties etc
    elems = $('.county')
    $.get('/getLocations',function(response){
         countSubs = response;

        // get the individgual countes
        counties = Object.keys(countSubs)
        // get the classes to be apended the county Names
        // Loop to insert the data sets
        Object.keys(elems).forEach(e=>{        
            counties.forEach(c=>{
                opt = strToHtml(`<option value="${c}"> </option>`)              

                try{
                    elems[e].append(opt)
                }catch{
                
                }
            })
        })
    })

// student Toggler
    cntyElem   = document.getElementById('countyChanger')
    cntyElem.addEventListener('focusout',event=>{       
        optLoader (cntyElem)
    })
            
    
    // Father Togller
    fcntyElem   = document.getElementById('fcountyChanger')
    fcntyElem.addEventListener('focusout',event=>{       
        optLoader (fcntyElem)
    })

    // mother Togller
    mcntyElem   = document.getElementById('mcountyChanger')
    mcntyElem.addEventListener('focusout',event=>{       
        optLoader (mcntyElem)
    })
    
    // toggling the id scan upload of the student
    $('#stDobInput')[0].addEventListener("focusout", e=>{
        sibl = $("#waitinId").siblings() 
        // check age 
        if (getAge( new Date($('#stDobInput')[0].value)) < 18) {
            $("#stdIdDets")[0].innerHTML = ``;            
        }
        else{
            elements = strToHtml(`
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="basicpill-email-input">ID Number  </label>
                            <input type="text" class="form-control stdidNumber fieldValidate" target="all"  name="stdidNumber" id="basicpill-email-input">
                            <div class="inputErrMesage">
                                The ID Number Already Exists.
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="basicpill-email-input">Scanned ID  <small class="text-success">Front</small></label>
                            <input type="file" class="form-control"  name="stdIdFrnt" id="basicpill-email-input">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="basicpill-email-input">Scanned ID <small class="text-info" >Back</small></label>
                            <input type="file" class="form-control"  name="stdIdBck" id="basicpill-email-input">
                        </div>
                    </div>`)
            $('#stdIdDets').append(elements)
            
            }

        
    })

    //  This is for Writing onto the confirmation page
    
        $('#registration')[0].getElementsByTagName('input').forEach(
        e=>{
            try {
                e.addEventListener("focusout",(event)=>{
                    document.getElementById(e.getAttribute('name')).innerHTML = e.value; 
                })
            } catch (error) {
        
    }
    
        }
    )
 
    $('#fPhoneNumber')[0].addEventListener('focusout', event=>{
        val = $('#fPhoneNumber')[0].value
        $('#mpesaPhoneNo').val(val)
    }) 
    // this, helped in the reducing of the breaking of the css.
    $('#otpParagraph1').hide();
    $('#otpParagraph2').hide();
    $("a[href='#finish']").hide();
    

    

    // to bind the inputs to the validators
    binder()
    nextBtnToggle(counter()) 

    
    // place the listener huku
    $("a[href='#next']").click(function (e) { 
        fieldValidity = $('.check.body.current')[0].classList[0] == 'true' ? true : false
        setTimeout(() => {
            console.info(counter())
            nextBtnToggle(counter()) 
            binder()
            console.log('Just Visiting',fieldValidity)
        }, 100);
       
          
    }); 
    


    $('.skipper').keyup((e)=>{ 
       console.log(e.which)
       activeId = parseInt(document.activeElement['id'][5]);

        code = e.which
        if(code == 8){
            $(`#digit${activeId==1 ? activeId : activeId-1}-input`).focus()
        }else if(  (code>=0 && code<=90 )|| (code >=96 && code <= 105) ){
            // get the active element and skip mble
            $(`#digit${activeId==4 ? activeId : activeId+1}-input`).focus()
        }
        // this is to check for the Otp Matching
        if (activeId == 4) {
           input =  Object.keys($('.skipper')).map(g=>{return $('.skipper')[g].value}).filter(t=>{return t != undefined}).join('')
           if (input ==localStorage.getItem("otp") ) {
                toastr.success('Your number Has Been Successfully verified.')
                // set otp as password
                $('#registration')[0].append(strToHtml(`<input type="text" name="otp" value="${localStorage.getItem('otp')}" hidden>`))
                document.getElementById("otp").value =localStorage.getItem(otp);
                $("a[href='#next']").click()
           } else {
                toastr.error('The OTP You Provided Does Not match. Please Recheck the  Code')
           }
        }
    })

    //   this is the second

    $('#otpB').click(function (e) { 
        e.preventDefault();
        // generate the otp
        otp=otpGenerator('otp');
        message = `Use ${otp} as your Otp. Note, You will use this as your password For Logging into Your account.`
        phone = $('#fPhoneNumber')[0].value 
        document.getElementById("phoneNumber").innerHTML = phone; 

         res= $.get(`/otp/${message}/${phone}`)
        
        //  if (res.status == 200 ) {
            toastr.info('The Otp Has Been Sent To Your Phone Number') 
            $('#otpB').hide();
            $('#otpParagraph1').show()                
            $('#otpParagraph2').show()         
        //  } else{
        //      toastr.warning('There Was An error During the processing of your Otp. Please Request another');
        //      $('#otpB').show();
        //      $('#otpParagraph1').hide()                
        //      $('#otpParagraph2').hide() 
        //  }
        
        // $.get(`/otp/${otp}/${phone}`);     tempOtpSkipper
    });



    // this is the validator
        idElem = $('.fidNumber')[0]
        idElem.addEventListener('focusout',(event)=>{
            $.get(`api/validate/${idElem.value}`,function(response){
                if (response != 'Null') {
                    id = response['id']
                    phone = response['phoneNumber']
                    name = $('#sfName')[0].innerHTML
                    index = $('#indexNumber')[0].innerHTML
                    toastr.info("Account With The same Id was Found")

                    tempOtp = otpGenerator('tempOtp')
                    message = `Student: ${name} \n Index Number: ${index} Is trying to register With Your ID Number \n Please use ${tempOtp} to validate the student.`
                    res= $.get(`/otp/${message}/${phone}`)
                    console.log(res)
                    // if (res.status == 'success' ) {
                    toastr.info('The Otp Has Been Sent To Your Phone Number')       
                    // } else{
                    //     toastr.warning('There Was An error During the processing of your Otp. Please Request another');
                    // }

                    $('#userRegClose').click()
                    $('#tempOtpBtn').click()
                }
            });
        })



    // ?skipps teh temp  otp modal elements
    $('.tempOtpSkipper').keyup((e)=>{ 
    console.log(e.which)
    //    get the currently active element
    activeId = parseInt(document.activeElement['id'][5]);
    //    Thisis to get the otp.. to be  used later 
        // get the key code that has been pressed
        code = e.which
        if(code == 8){
            $(`#digit${activeId==4 ? activeId : activeId-1}-input`).focus()
        }else if(  (code>=0 && code<=90 )|| (code >=96 && code <= 105) ){
            // get the active element and skip mble
            $(`#digit${activeId==8 ? activeId : activeId+1}-input`).focus()
        }
        // this is to check for the Otp Matching and also the Skipping of the inpute to te nextfocal point
        if (activeId == 8) {
        input =  Object.keys($('.tempOtpSkipper')).map(g=>{return $('.tempOtpSkipper')[g].value}).filter(t=>{return t != undefined}).join('')
        if (input ==localStorage.getItem("tempOtp") ) {
                toastr.success('You were Successfully Onboarded to the system, Please use your original otp To login')
                benefForm = $(`#benefReg`)[0]
                $('#mainId').val(id);
                benefForm.append($('#basic-example-p-0')[0]);
                benefForm.submit()
        } else {
                toastr.error('The OTP You Provided Does Not match. Please Recheck the  Code')
        }
        }
    })



    $('#mpesaLater')[0].addEventListener('click',(e)=>{
        e.preventDefault()
        toastr.success('You have been successfull registered.')
        $('#registration').submit()
    })

    // this is to calculate the age and so toggle the neccesry fields



    $('#mpesaStk')[0].addEventListener('click',(e)=>{
        e.preventDefault()
        $('#mpesaLater').hide();
        toastr.info('Please Wait')
        phoneNumber = $('#mpesaPhoneNo').val()
        idNumber    =$('#idNumber').text()
        mpesaStk(phoneNumber,idNumber)

        // stk push to be handled here.
        // $('#registration').submit()
    })




    
    

    
});

</script>



  
