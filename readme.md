## INSERT

//Insert
Route::get('/insert', function () {
    DB::insert('INSERT INTO *dbname(*column1, *column2..) VALUE(?, ?..)', [ '*valuename1', '*valuename2'..]);
    return 'something';
});

## UPDATE

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