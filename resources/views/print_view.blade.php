<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Book Preview | BookWriter</title>
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700;900&display=swap");

      html {
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif, serif;
        font-size: 1rem;
        line-height: 1.6rem;
      }
      article {
        padding: 1rem;
        margin: 0 auto;
      }
      h1 {
        font-size: 3rem;
        line-height: 3.5rem;
        font-weight: 900;
        text-transform: capitalize;
      }
      /* .center_text{
        width: 100%;
        text-align: center;
      } */
      h2,h3,h4 {
        text-transform: capitalize;
      }
      p {
        text-align: justify;
        hyphens: auto;
      }
  </style>

</head>
<body>
{{-- 


  

source --}}

  <article>
    <h1 class="center_text">{{$bookInfo->title ?? "No title found"}}</h1>
    <p class="center_text">
        <strong>Author: </strong> {{$bookInfo->author ?? ""}} <br/>
        <strong>Genre: </strong> {{$bookInfo->genre ?? ""}} <br/>
        <strong>Themes: </strong> {{$bookInfo->themes ?? ""}} <br/>
        <strong>Summery: </strong> {{$bookInfo->summery ?? ""}}
    </p>

    <h3 class="center_text">Structure</h3>
    <p class="center_text">{{$structure->structure ?? ""}}</p>
    
    @if(isset($str_chapters))
      @foreach ($str_chapters as $chapter)
      
        <h2 class="center_text">{{'Chapter '.$chapter->chapter_number ?? ""}}</h2>
        <h2 class="center_text">{{$chapter->chapter_title ?? ""}}</h2>
        @if($chapter->chapter_type_id == 1)
          <h3>Chapter Type: Normal Chapter</h3>
        @elseif($chapter->chapter_type_id == 2)
          <h3>Chapter Type: Interlude</h3>
        @elseif($chapter->chapter_type_id == 3)
          <h3>Chapter Type: Prologue</h3> 
        @elseif($chapter->chapter_type_id == 4)
          <h3>Chapter Type: Epilogue</h3> 
        @endif
        <p><strong>Location:</strong><br/>{{$chapter->chapter_location ??  ""}}</p>
        <p><strong>Characters:</strong><br/>{{$chapter->chapter_characters ?? ""}}</p>
        <p><strong>Abstract:</strong><br/>{{$chapter->chapter_abstract ?? ""}}</p>
        <p><strong>Issues:</strong><br/>{{$chapter->chapter_issues ?? ""}}</p>
        <h2>Scenes</h2>
        @if(isset($chapter->scenes))
          @foreach ($chapter->scenes as $scene)
            <p><strong>Scene#</strong> {{$scene->scene_number ?? ""}}<br/></p>
            <p><strong>Location</strong><br/>{{$scene->scene_location ?? ""}}<br/></p>
            <p><strong>Characters</strong><br/>{{$scene->scene_characters ?? ""}}<br/></p>
            <p><strong>Issues</strong><br/>{{$scene->scene_issues ?? ""}}<br/></p>
            <p><strong>Abstract</strong><br/>{{$scene->scene_abstract ?? ""}}</p>
            <br/><br/>
          @endforeach
        @endif
        <br/><br/>
      @endforeach
    @endif

    <br/><br/>
    @if(isset($chapters))
      @foreach ($chapters as $chapter)
        <h2 class="center_text">{{'Chapter '.$chapter->chapter_number ?? ""}}</h2>
        <h2 class="center_text">{{$chapter->chapter_title ?? ""}}</h2>
        @if($chapter->chapter_type_id == 1)
          <h3>Chapter Type: Normal Chapter</h3>
        @elseif($chapter->chapter_type_id == 2)
          <h3>Chapter Type: Interlude</h3>
        @elseif($chapter->chapter_type_id == 3)
          <h3>Chapter Type: Prologue</h3> 
        @elseif($chapter->chapter_type_id == 4)
          <h3>Chapter Type: Epilogue</h3> 
        @endif
        <p>{{$chapter->chapter_content ??  ""}}</p>
        <br/><br/>
      @endforeach
    @endif


    @if(isset($characters))
      @foreach ($characters as $character)
        <h2>Characters</h2>
          @if(isset($character->avatar))
            <img width="200" style="cursor: pointer" src="{{asset("storage/characters/$character->avatar")}}" alt=""/>
          @else
            <img width="200" style="cursor: pointer" src="{{asset("storage/characters/avatar.png")}}" alt=""/>
          @endif
          <p><strong>Firstname:</strong> {{$character->f_name ?? ""}}</p>
          <p><strong>Lastname:</strong> {{$character->l_name ?? ""}}</p>
          <p><strong>Gender:</strong> {{$character->gender ?? ""}}</p>
          <p><strong>Age:</strong> {{$character->age ?? ""}}</p>
          <p><strong>Physical Description:<br/></strong> {{$character->physical_description ?? ""}}</p>
          <p><strong>Summary:</strong><br/>{{$character->summery ?? ""}} </p>
          <p><strong>Skills:</strong> {{$character->skills ?? ""}} </p>
          <p><strong>History:</strong><br/>{{$character->history ?? ""}} </p>
          <p><strong>evolution:</strong><br/>{{$character->evolution ?? ""}} </p>
          <p><strong>motivation:</strong><br/>{{$character->motivation ?? ""}} </p>
          <p><strong>Additional Information:</strong><br/>{{$character->additional_information ?? ""}}</p>
        <br/><br/>
      @endforeach
    @endif

    <br/><br/>

    @if (isset($geographies))
      @foreach ($geographies as $geography)
        <h2>Geographies</h2>
        <p><strong>Place Name:</strong> {{$geography->place_name ?? ""}}</p>
        <p><strong>Category:</strong> {{$geography->category ?? ""}}</p>
        <p><strong>Description:</strong> {{$geography->description ?? ""}}</p>
        <p><strong>Additional Information:</strong> {{$geography->additional_information ?? ""}}</p>
        <br/><br/>
      @endforeach
    @endif

    @if(isset($b_universes) && $b_universes != null)
      <h2>Bestiary Universes</h2>
      @foreach ($b_universes as $universe)
        @if( isset($universe->title) && $universe->title != '') <p><strong>Title: </strong> {{$universe->title?? ''}} </p> @endif
        @if( isset($universe->name) && $universe->name != '') <p><strong>Name: </strong> {{$universe->name?? ''}} </p> @endif
        @if( isset($universe->description) && $universe->description != '') <p><strong>Description: </strong> {{$universe->description?? ''}} </p> @endif
        @if( isset($universe->origins_and_location) && $universe->origins_and_location != '') <p><strong>Origins and Location: </strong> {{$universe->origins_and_location?? ''}} </p> @endif
        @if( isset($universe->miscellaneous_information) && $universe->miscellaneous_information != '') <p><strong>Miscellaneous Information: </strong> {{$universe->miscellaneous_information?? ''}} </p> @endif
        @if( isset($universe->rules_and_limits) && $universe->rules_and_limits != '') <p><strong>Rules and Limits: </strong> {{$universe->rules_and_limits?? ''}} </p> @endif
        @if( isset($universe->content) && $universe->content != '') <p><strong>Content: </strong> {{$universe->content?? ''}} </p> @endif
        @if( isset($universe->technical_terms_jargons) && $universe->technical_terms_jargons != '') <p><strong>Technical Terms Jargons: </strong> {{$universe->technical_terms_jargons?? ''}} </p> @endif
        <br/><br/>
      @endforeach
    @endif
    <br/><br/>
    @if(isset($c_universes) && $c_universes != null)
      <h2>Civilization Universes</h2>
      @foreach ($c_universes as $universe)
        @if( isset($universe->title) && $universe->title != '') <p><strong>Title: </strong> {{$universe->title?? ''}} </p> @endif
        @if( isset($universe->name) && $universe->name != '') <p><strong>Name: </strong> {{$universe->name?? ''}} </p> @endif
        @if( isset($universe->description) && $universe->description != '') <p><strong>Description: </strong> {{$universe->description?? ''}} </p> @endif
        @if( isset($universe->origins_and_location) && $universe->origins_and_location != '') <p><strong>Origins and Location: </strong> {{$universe->origins_and_location?? ''}} </p> @endif
        @if( isset($universe->miscellaneous_information) && $universe->miscellaneous_information != '') <p><strong>Miscellaneous Information: </strong> {{$universe->miscellaneous_information?? ''}} </p> @endif
        @if( isset($universe->rules_and_limits) && $universe->rules_and_limits != '') <p><strong>Rules and Limits: </strong> {{$universe->rules_and_limits?? ''}} </p> @endif
        @if( isset($universe->content) && $universe->content != '') <p><strong>Content: </strong> {{$universe->content?? ''}} </p> @endif
        @if( isset($universe->technical_terms_jargons) && $universe->technical_terms_jargons != '') <p><strong>Technical Terms Jargons: </strong> {{$universe->technical_terms_jargons?? ''}} </p> @endif
        <br/><br/>
      @endforeach
    @endif
    <br/><br/>
    @if(isset($m_universes) && $m_universes != null)
      <h2>Magic Universes</h2>
      @foreach ($m_universes as $universe)
        @if( isset($universe->title) && $universe->title != '') <p><strong>Title: </strong> {{$universe->title?? ''}} </p> @endif
        @if( isset($universe->name) && $universe->name != '') <p><strong>Name: </strong> {{$universe->name?? ''}} </p> @endif
        @if( isset($universe->description) && $universe->description != '') <p><strong>Description: </strong> {{$universe->description?? ''}} </p> @endif
        @if( isset($universe->origins_and_location) && $universe->origins_and_location != '') <p><strong>Origins and Location: </strong> {{$universe->origins_and_location?? ''}} </p> @endif
        @if( isset($universe->miscellaneous_information) && $universe->miscellaneous_information != '') <p><strong>Miscellaneous Information: </strong> {{$universe->miscellaneous_information?? ''}} </p> @endif
        @if( isset($universe->rules_and_limits) && $universe->rules_and_limits != '') <p><strong>Rules and Limits: </strong> {{$universe->rules_and_limits?? ''}} </p> @endif
        @if( isset($universe->content) && $universe->content != '') <p><strong>Content: </strong> {{$universe->content?? ''}} </p> @endif
        @if( isset($universe->technical_terms_jargons) && $universe->technical_terms_jargons != '') <p><strong>Technical Terms Jargons: </strong> {{$universe->technical_terms_jargons?? ''}} </p> @endif
        <br/><br/>
      @endforeach
    @endif
    <br/><br/>
    @if(isset($ml_universes) && $ml_universes != null)
      <h2>Myths and Legends' Universes</h2>
      @foreach ($ml_universes as $universe)
        @if( isset($universe->title) && $universe->title != '') <p><strong>Title: </strong> {{$universe->title?? ''}} </p> @endif
        @if( isset($universe->name) && $universe->name != '') <p><strong>Name: </strong> {{$universe->name?? ''}} </p> @endif
        @if( isset($universe->description) && $universe->description != '') <p><strong>Description: </strong> {{$universe->description?? ''}} </p> @endif
        @if( isset($universe->origins_and_location) && $universe->origins_and_location != '') <p><strong>Origins and Location: </strong> {{$universe->origins_and_location?? ''}} </p> @endif
        @if( isset($universe->miscellaneous_information) && $universe->miscellaneous_information != '') <p><strong>Miscellaneous Information: </strong> {{$universe->miscellaneous_information?? ''}} </p> @endif
        @if( isset($universe->rules_and_limits) && $universe->rules_and_limits != '') <p><strong>Rules and Limits: </strong> {{$universe->rules_and_limits?? ''}} </p> @endif
        @if( isset($universe->content) && $universe->content != '') <p><strong>Content: </strong> {{$universe->content?? ''}} </p> @endif
        @if( isset($universe->technical_terms_jargons) && $universe->technical_terms_jargons != '') <p><strong>Technical Terms Jargons: </strong> {{$universe->technical_terms_jargons?? ''}} </p> @endif
        <br/><br/>
      @endforeach
    @endif
    <br/><br/>
    @if(isset($t_universes) && $t_universes != null)
      <h2>Technology Universes</h2>
      @foreach ($t_universes as $universe)
        @if( isset($universe->title) && $universe->title != '') <p><strong>Title: </strong> {{$universe->title?? ''}} </p> @endif
        @if( isset($universe->name) && $universe->name != '') <p><strong>Name: </strong> {{$universe->name?? ''}} </p> @endif
        @if( isset($universe->description) && $universe->description != '') <p><strong>Description: </strong> {{$universe->description?? ''}} </p> @endif
        @if( isset($universe->origins_and_location) && $universe->origins_and_location != '') <p><strong>Origins and Location: </strong> {{$universe->origins_and_location?? ''}} </p> @endif
        @if( isset($universe->miscellaneous_information) && $universe->miscellaneous_information != '') <p><strong>Miscellaneous Information: </strong> {{$universe->miscellaneous_information?? ''}} </p> @endif
        @if( isset($universe->rules_and_limits) && $universe->rules_and_limits != '') <p><strong>Rules and Limits: </strong> {{$universe->rules_and_limits?? ''}} </p> @endif
        @if( isset($universe->content) && $universe->content != '') <p><strong>Content: </strong> {{$universe->content?? ''}} </p> @endif
        @if( isset($universe->technical_terms_jargons) && $universe->technical_terms_jargons != '') <p><strong>Technical Terms Jargons: </strong> {{$universe->technical_terms_jargons?? ''}} </p> @endif
        <br/><br/>
      @endforeach
    @endif
    <br/><br/>
    @if(isset($o_universes) && $o_universes != null)
      <h2>Other Universes</h2>
      @foreach ($o_universes as $universe)
        @if( isset($universe->title) && $universe->title != '') <p><strong>Title: </strong> {{$universe->title?? ''}} </p> @endif
        @if( isset($universe->name) && $universe->name != '') <p><strong>Name: </strong> {{$universe->name?? ''}} </p> @endif
        @if( isset($universe->description) && $universe->description != '') <p><strong>Description: </strong> {{$universe->description?? ''}} </p> @endif
        @if( isset($universe->origins_and_location) && $universe->origins_and_location != '') <p><strong>Origins and Location: </strong> {{$universe->origins_and_location?? ''}} </p> @endif
        @if( isset($universe->miscellaneous_information) && $universe->miscellaneous_information != '') <p><strong>Miscellaneous Information: </strong> {{$universe->miscellaneous_information?? ''}} </p> @endif
        @if( isset($universe->rules_and_limits) && $universe->rules_and_limits != '') <p><strong>Rules and Limits: </strong> {{$universe->rules_and_limits?? ''}} </p> @endif
        @if( isset($universe->content) && $universe->content != '') <p><strong>Content: </strong> {{$universe->content?? ''}} </p> @endif
        @if( isset($universe->technical_terms_jargons) && $universe->technical_terms_jargons != '') <p><strong>Technical Terms Jargons: </strong> {{$universe->technical_terms_jargons?? ''}} </p> @endif
        <br/><br/>
      @endforeach
    @endif
    <br/><br/>

    <h2>Illustrations</h2>
    @if(isset($pictures) && $pictures != null)
      @foreach ($pictures as $picture)
        <img style="width: 80%" src="{{asset("storage/illustrations/$picture->image_name")}}" alt=""/>
        <br/>
      @endforeach
    @endif
    <br/><br/>

    @if(isset($notes) && $notes != null)
      <h2>Notes</h2>
      @foreach ($notes as $note)
        <p><strong>Title: </strong>{{$note->title?? ""}}</p>
        <p><strong>Description:</strong><br/>{{$note->note?? ""}}</p>
      @endforeach
    @endif
    <br/><br/>

    @if(isset($source) && $source != null)
      <h2>Source</h2>
      <p>{{$source->sources}}</p>
    @endif
  </article>
  
</body>
</html>
