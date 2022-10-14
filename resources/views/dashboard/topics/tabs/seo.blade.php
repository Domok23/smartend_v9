@if ($WebmasterSection->type != 4)
    @if (Helper::GeneralWebmasterSettings('seo_status'))
        <div class="tab-pane  {{ $tab_2 }}" id="tab_seo">

            <div class="box-body">
                {{ Form::open(['route' => ['topicsSEOUpdate', 'webmasterId' => $WebmasterSection->id, 'id' => $Topics->id], 'method' => 'POST']) }}
                @foreach (Helper::languagesList() as $ActiveLanguage)
                    @if ($ActiveLanguage->box_status)
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div>
                                        <label>{!! __('backend.topicSEOTitle') !!}</label> {!! @Helper::languageName($ActiveLanguage) !!}

                                        {!! Form::text('seo_title_' . @$ActiveLanguage->code, $Topics->{'seo_title_' . @$ActiveLanguage->code}, [
                                            'class' => 'form-control',
                                            'id' => 'seo_title_' . @$ActiveLanguage->code,
                                            'maxlength' => '65',
                                            'dir' => @$ActiveLanguage->direction,
                                        ]) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div>
                                        <label>{!! __('backend.friendlyURL') !!}</label> {!! @Helper::languageName($ActiveLanguage) !!}

                                        {!! Form::text('seo_url_slug_' . @$ActiveLanguage->code, $Topics->{'seo_url_slug_' . @$ActiveLanguage->code}, [
                                            'class' => 'form-control',
                                            'id' => 'seo_url_slug_' . @$ActiveLanguage->code,
                                            'dir' => @$ActiveLanguage->direction,
                                        ]) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div>
                                        <label>{!! __('backend.topicSEODesc') !!}</label> {!! @Helper::languageName($ActiveLanguage) !!}

                                        {!! Form::textarea(
                                            'seo_description_' . @$ActiveLanguage->code,
                                            $Topics->{'seo_description_' . @$ActiveLanguage->code},
                                            [
                                                'class' => 'form-control',
                                                'id' => 'seo_description_' . @$ActiveLanguage->code,
                                                'maxlength' => '165',
                                                'dir' => @$ActiveLanguage->direction,
                                                'rows' => '2',
                                            ],
                                        ) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div>
                                        <label>{!! __('backend.topicSEOKeywords') !!}</label> {!! @Helper::languageName($ActiveLanguage) !!}

                                        {!! Form::textarea(
                                            'seo_keywords_' . @$ActiveLanguage->code,
                                            $Topics->{'seo_keywords_' . @$ActiveLanguage->code},
                                            [
                                                'class' => 'form-control',
                                                'id' => 'seo_keywords_' . @$ActiveLanguage->code,
                                                'dir' => @$ActiveLanguage->direction,
                                                'rows' => '2',
                                            ],
                                        ) !!}
                                    </div>
                                </div>
                                <br>
                                <br>
                            </div>
                            <div class="col-sm-6">
                                <?php
                                $seo_example_title = $Topics->{'title_' . @$ActiveLanguage->code};
                                $seo_example_desc = Helper::GeneralSiteSettings('site_desc_' . @$ActiveLanguage->code);
                                if ($Topics->{'seo_title_' . @$ActiveLanguage->code} != '') {
                                    $seo_example_title = $Topics->{'seo_title_' . @$ActiveLanguage->code};
                                }
                                if ($Topics->{'seo_description_' . @$ActiveLanguage->code} != '') {
                                    $seo_example_desc = $Topics->{'seo_description_' . @$ActiveLanguage->code};
                                }
                                $seo_example_url = Helper::topicURL($Topics->id, @$ActiveLanguage->code);
                                ?>
                                <div class="form-group">
                                    <div class="search-example-div">
                                        {!! @Helper::languageName($ActiveLanguage) !!}
                                        <div class="search-example" dir="{{ @$ActiveLanguage->direction }}">
                                            <a id="title_in_engines_{{ @$ActiveLanguage->code }}"
                                                href="{{ $seo_example_url }}"
                                                target="_blank">{{ $seo_example_title }}</a>
                                            <span
                                                id="url_in_engines_{{ @$ActiveLanguage->code }}">{{ $seo_example_url }}</span>
                                            <div id="desc_in_engines_{{ @$ActiveLanguage->code }}">
                                                {{ $seo_example_desc }}
                                                ...
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div>
                                        <i class="material-icons">&#xe8fd;</i>
                                        <small>{!! __('backend.seoTabSettings') !!}</small>
                                    </div>
                                </div>
                                <br>
                                <br>
                            </div>
                        </div>
                    @endif
                @endforeach

                <div class="form-group">
                    <div>
                        <button type="submit" class="btn btn-primary m-t"><i class="material-icons">
                                &#xe31b;</i> {!! __('backend.update') !!}</button>
                        <a href="{{ route('topics', $WebmasterSection->id) }}" class="btn btn-default m-t"><i
                                class="material-icons">
                                &#xe5cd;</i> {!! __('backend.cancel') !!}</a>
                    </div>
                </div>
                {{ Form::close() }}
            </div>

        </div>
    @endif
@endif
