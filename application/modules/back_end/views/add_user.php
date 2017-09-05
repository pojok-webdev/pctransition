    	<h1>User Management</h1>
        <div class="content_isi">
        	<form id="adminForm" name="adminForm" method="post" action="add_user_handler">
            	<div class="toolbar">
                	<label>
                        <input type="image" style="float: left; background: none;" src="<?php echo base_url();?>themes/images/save.png" value="save" name="save">
                        <br>
                        <span style="clear:both; display:block;">Simpan</span>
                    </label>
                	<label>
                        <input type="image" style="float: left; background: none;" src="<?php echo base_url();?>themes/images/cancel.png" value="cancel" name="cancel">
                        <br>
                        <span style="clear:both; display:block;">Batal</span>
                    </label>
                </div>
                <div id="form">
                	<fieldset style="margin-top:50px">
                    	<legend>Entry User</legend>
                        <table class="table_entry">
                        	<tbody>
                            	<tr>
                                    <td width="23%">Username * </td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <input id="usrname" class="{required: true}" type="text" value="" maxlength="20" size="20" name="username">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Email * </td>
                                    <td>:</td>
                                    <td>
                                    <input id="email" class="{required: true, email: true}" type="text" size="40" value="" name="email">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Password * </td>
                                    <td>:</td>
                                    <td>
                                    <input id="password" class="{required: true, minlength: 5}" type="password" value="" name="password">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Re-password * </td>
                                    <td>:</td>
                                    <td>
                                    <input id="password2" class="{required: true, minlength: 5, equalTo: '#password'}" type="password" name="password2">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Group * </td>
                                    <td>:</td>
                                    <td>
                                    <select id="id_group" class="{required: true}" name="id_group">
                                    <option value=""></option>
                                    <option value="1">Super Administrator</option>
                                    <option value="2">Administrator</option>
                                    <option value="3">Entry Data</option>
                                    <option value="4">User</option>
                                    </select>
                                    <input id="cek_menu_akses" type="checkbox" style="display: none;" value="checkbox" name="cek_menu_akses">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Aktif</td>
                                    <td>:</td>
                                    <td>
                                    <input type="radio" value="1" name="aktif">
                                    Ya
                                    <input type="radio" value="0" name="aktif">
                                    Tidak
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </fieldset>
                </div>
                
            </form>
        </div>
        <div id="footer">KPI Call Center © 2012. All Rights Reserved.</div>            
