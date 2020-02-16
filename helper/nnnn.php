    <script type="text/javascript">
        function submitCode(){
            var confirmVerCode = $("#confirmVerCode").val();
            var confirmUserCode = $("#confirmUserCode").val();
            $.ajax({
                url: 'confirmCode.php',
                method: 'post',
                data:{'confirmVerCode':confirmVerCode,'confirmUserCode':confirmUserCode},
                success:function(data)
                {
                    if (data == "success")
                    {
                        toastr.success("Please wait for the owner to activate your account.","Welcome");
                        setTimeout(function(){window.location = "index.php"}, 2500);
                    }
                    else
                    {
                        toastr.error("Incorrect confirmation code.","Error");
                        setTimeout(function(){window.location = "registration.php"}, 2500);
                    }
                }
            })
        }
    </script>

          <!-- Modal -->
      <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="confirmCode" class="modal fade">
          <div class="modal-dialog modal-sm">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4>Confimation code</h4><hr>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <label>We sent an email to: </label><br>
                      <label><b id="emailConfirm"></b></label><hr>
                      <p>Please enter the verification code:</p>
                      <input type="hidden" placeholder="" id="confirmUserCode" class="form-control placeholder-no-fix">
                      <input type="number" placeholder="6 digit verification code..." id="confirmVerCode" autocomplete="off" class="form-control placeholder-no-fix"><hr>
                      <small>Did not recieve verification code.<br>
                      <a href="resend">resend?</a> </small>
                  </div>
                  <div class="modal-footer">
                      <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                      <button class="btn btn-success" onclick="submitCode()" type="button">Submit</button>
                  </div>
              </div>
          </div>
      </div>
      <!-- modal -->