<?php 
ORM::configure("mysql:host=localhost;dbname=projet;charset=utf8");
ORM::configure("username", "root");
ORM::configure("password", "brucemax67");
    

/**
Get the 10 most popular series for the homepage
*/
function getHomeSeries(){
     
    $result = ORM::for_table('series')->select('*')->order_by_asc('popularity')->limit(10)->find_array();
    return $result;
}

/**
Query the DB to get a serie by its name
*/
function search($words){
    return ORM::for_table('series')->where_like('name', '%'.$words.'%')->find_many();
}


/**
get a serie from its ID
*/
function getSerie($id){
    return ORM::for_table('series')->find_one($id);
}

/**
get a serie's genres from its ID
*/
function getGenre($id){
    $serie = ORM::for_table('series')->find_one($id);
    $genres = ORM::for_table('seriesgenres')->where('series_id', $id)->find_array();
    $genreName = array();
    foreach($genres as $genre){
        array_push($genreName, ORM::for_table('genres')->find_one($genre['genre_id']));
    }
    return $genreName;
}

/**
get a serie's seasons from its ID
*/
function getSaisons($id){
    $saisons = ORM::for_table('seriesseasons')->where('series_id', $id)->find_array();
    $seasonNames = array();
    foreach($saisons as $saison){
        array_push($seasonNames, ORM::for_table('seasons')->find_one($saison['season_id']));
    }
    return $seasonNames;
}

/**
get a season from its ID
*/
function getSaison($id){
    return ORM::for_table('seasons')->find_one($id);

}

/**
Get episodes of a seasons from its ID
*/
function getEpisodes($id){
    
    $episodes = ORM::for_table('seasonsepisodes')->where('season_id', $id)->find_array();
    $episodesNames = array();
    foreach($episodes as $episode){
        array_push($episodesNames, ORM::for_table('episodes')->find_one($episode['episode_id']));
    }
    return $episodesNames;
}

/**
get episode from its ID
*/
function getEpisode($id){
    return $episode = ORM::for_table('episodes')->find_one($id);
}

/**
Get actors from episode's ID
*/
function getActors($id){
    
    $actors = ORM::for_table('episodesactors')->where('episode_id', $id)->find_array();
    $actorsNames = array();
    foreach($actors as $actor){
        array_push($actorsNames, ORM::for_table('actors')->find_one($actor['actor_id']));
    }
    return $actorsNames;
}