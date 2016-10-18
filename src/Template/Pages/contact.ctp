<?php
$this->layout = 'default_inner';
?>
<div class="col-lg-8 col-md-8 col-lg-push-4 col-md-push-4"><!-- doc body wrapper -->

    <div class="col-padded"><!-- inner custom column -->

        <div class="row gutter"><!-- row -->

            <div class="col-lg-12 col-md-12">

                <div id="k-contact-map" class="clearfix"><!-- map -->
                    <div
                            id="g-map-1"
                            class="map"
                            data-gmaptitle="Contact"
                            data-gmapzoom="15"
                            data-gmaplon="4.6954964"
                            data-gmaplat="8.149895"
                            data-gmapmarker=""
                            data-cname="Summit University, Offa"
                            data-caddress="Irra Road"
                            data-ccity="Offa"
                            data-cstate="Kwara"
                            data-czip="23401"
                            data-ccountry="Nigeria">
                    </div>
                </div>

                <h1 class="page-title">Contact Us</h1>

                <div class="news-body">

                    <p>
                        Praesent id felis sagittis, suscipit ligula sed, condimentum nisi. In non commodo risus. Praesent fringilla ligula in orci consectetur pulvinar. Nunc facilisis metus pellentesque, vestibulum libero eget, varius elit. Aliquam sed gravida dui, a imperdiet eros. Cras dignissim libero id feugiat pharetra. Nullam ut bibendum est, sed tincidunt massa.
                    </p>

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <h6 class="remove-margin-bottom">Summit University, Offa, Kwara State</h6>
                            <p class="small">Tel: 631 551 31 77   |   Fax: 631 551 31 78</p>

                            <h6 class="remove-margin-top remove-margin-bottom">Lagos Liason Office</h6>
                            <p class="small">Tel: 631 552 32 77   |   Fax: 631 552 32 78</p>

                        </div>
                    </div>

                    <hr />

                    <h6>Drop us a note!</h6>

                    <form id="contactform" method="post" action="#">
                        <div class="row"><!-- starts row -->
                            <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                <label for="contactName"><span class="required">*</span> Name</label>
                                <input type="text" aria-required="true" size="30" value="" name="contactName" id="contactName" class="form-control requiredField" />
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                <label for="email"><span class="required">*</span> E-mail</label>
                                <input type="text" aria-required="true" size="30" value="" name="email" id="email" class="form-control requiredField" />
                            </div>
                        </div><!-- ends row -->

                        <div class="row"><!-- starts row -->
                            <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                <label for="contactPhone">Phone / Cell</label>
                                <input type="text" aria-required="true" size="30" value="" name="contactPhone" id="contactPhone" class="form-control" />
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                <label for="contactSchool">Enquiry Type</label>
                                <select name="contactSchool" id="contactSchool" class="form-control">
                                    <option value="High School">Admissions</option>
                                    <option value="Middle School">Tuition</option>
                                    <option value="Intermediate School">Complaints</option>
                                    <option value="Primary School">General Enquiries</option>
                                </select>
                            </div>
                        </div><!-- ends row -->

                        <div class="row"><!-- starts row -->
                            <div class="form-group col-lg-12">
                                <label for="contactSubject">Message Subject</label>
                                <input type="text" aria-required="true" size="30" value="" name="contactSubject" id="contactSubject" class="form-control" />
                            </div>
                        </div><!-- ends row -->

                        <div class="row"><!-- starts row -->
                            <div class="form-group clearfix col-lg-12">
                                <label for="comments"><span class="required">*</span> Message</label>
                                <textarea aria-required="true" rows="5" cols="45" name="comments" id="comments" class="form-control requiredField mezage"></textarea>
                            </div>

                            <div class="form-group clearfix col-lg-12 text-right remove-margin-bottom">
                                <input type="hidden" name="submitted" id="submitted" value="true" />
                                <input type="submit" value="Send Message" id="submit" name="submit"
                                       class="btn btn-success" />
                            </div>
                        </div><!-- ends row -->
                    </form>

                </div>

            </div>

        </div><!-- row end -->

    </div><!-- inner custom column end -->

</div><!-- doc body wrapper end -->
