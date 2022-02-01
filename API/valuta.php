 <form action="" method="get">
                        <h4><select name='v' id='v'>
                            <option value='1'>1</option>
                            <option value='2'>2</option>
                            <option value='3'>3</option>
                            <option value='4'>4</option>
                            <option value='5'>5</option>
                         </select>  / 5 </h4>

                        <textarea name="comment">
                            Inserisci qui il tuo commento
                        </textarea>
                        <script>
                            tinymce.init({
                                selector: 'textarea',
                                //plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
                                //toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table',
                                toolbar_mode: 'floating',
                                tinycomments_mode: 'embedded',
                                tinycomments_author: 'Author name',
                            });
                        </script>
                        <button type="submit">Invia</button>
</form>