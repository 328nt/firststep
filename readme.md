##NORMAL

# INSERT
//Insert
Route::get('/insert', function () {
    DB::insert('INSERT INTO *dbname(*column1, *column2..) VALUE(?, ?..)', [ '*valuename1', '*valuename2'..]);
    return 'something';
});

# UPDATE
//Update
Route::get('/update', function () {
    $*variablename = DB::update('UPDATE *dbname SET *column = "*something" WHERE id=?', [*id]);
    return $result;
});

# DELETE
//Delete
Route::get('/delete', function () {
    $*variablename = DB::delete('DELETE FROM *dbname WHERE id=?', [*id]);
    if ($*variablename*) {
        echo 'something';
    }
});

##ELOQUENT

#insert
//insert with new id 
Route::get('insertel', function () {

    //create variables.
    $*variable*= new *model*;

    //getdata
    $*variable*->*columnname* = '*add*';
    $*variable*->*columnname* = '*add*';
    ....

    //save data
    $*variable*->save();
});

//insert with id exsts
Route::get('insertelo', function () {

    //find variables want replace.
    $*variable*= POST::find(*id);

    //getdata
    $*variable*->*columnname* = '*replaced*';
    $*variable*->*columnname* = '*replaced*';
    ....
    
    //save data
    $*variable*->save();
});

#update
//update data with eloquent
Route::get('updateelo', function () {
    *modelname*::where('id', *id*)->update([
        '*column1*' => 'column1 afer update',
        '*column2*' => 'column2 after update'
        ...
    ]);
});

#delete
//delete data with eloquent destroy
Route::get('destroyelo', function () {
    *modelname*::destroy([*id1*, *id2*,...]);
});

##NOTE

#github
*clone github
CMD:
    composer install (install all composer used in project)
    .env.example .env (copy .env)

change the infomation in .ENV
run CMD:
    php artisan key:generate
    php artisan migrate
    php artisan serve

*up git
CMD
    git add *
    git commit -m "note"
    git push orrigin master