
<script type='text/template' name='team-create'>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header fluid">
                <h5 class="modal-title">Creating a team</h5>
                <div class='fill'></div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method='POST' class="modal-footer" name="teams.create">

                    <input type='text' class='form-control' name='name' placeholder='Team name'>
                    <br>
                    <textarea class='form-control' placeholder='Team description' rows='10' name='description'></textarea>
                    <br>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" >Create</button>
                    
                </form>
            </div>
            
        </div>
    </div>
</script>

<script type='text/template' name='team-update'>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header fluid">
                <h5 class="modal-title">Updating a team</h5>
                <div class='fill'></div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method='POST' class="modal-footer" name="teams.update">

                    <input type='text' class='form-control' name='name' placeholder='Team name' value='{team.name}'>
                    <br>
                    <textarea class='form-control' placeholder='Team description' rows='10' name='description'>{team.description}</textarea>
                    <br>
                    <input type='hidden' name='id' value='{team.id}'>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" >Save changes</button>
                    
                </form>
            </div>
            
        </div>
    </div>
</script>
<script type='text/template' name='team-change-avatar'>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header fluid">
                <h5 class="modal-title">Updating a team</h5>
                <div class='fill'></div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div><img src='{team.avatar}'></div>
                <hr>
                <form method='POST' class="modal-footer" name="teams.update">

                    <div style='display: none;min-height: 100px;' id='team-avatar-container'></div>
                    <input type='file' class='form-control' data-uploader-image data-input='#team-input-avatar' data-preview='#team-avatar-container' >
                    <input type='hidden' name='avatar' id='team-input-avatar'>
                    <input type='hidden' name='id' value='{team.id}'>
                    <br><br>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" >Save changes</button>
                    
                </form>
            </div>
        </div>
    </div>
</script>


<script type='text/template' name='team-remove'>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header fluid">
                <h5 class="modal-title">Are you sure?</h5>
                <div class='fill'></div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>You can't go back.</p>
            </div>
            
            <form method='POST' class="modal-footer" name='teams.remove'>
                <input type='hidden' name='id' value='{team.id}'>
                <button type="submit" class="btn btn-primary" >Yes, remove</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Close</button>
                
            </form>
        </div>
    </div>
</script>