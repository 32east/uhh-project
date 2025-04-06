create table if not exists country (
    id serial primary key not null,
    country_name varchar(64) not null,
    country_code char(2) not null
);

create table if not exists url (
    id serial primary key not null,
    url text not null,
    uri varchar(16) not null,
    created_by inet not null,
    created_at timestamp not null
);

create table if not exists "url-ip" (
    id serial primary key not null,
    url_id int not null,
    ip inet not null,
    country_id int not null,
    redirect_time timestamp not null,

    foreign key (url_id) references url(id),
    foreign key (country_id) references country(id)
);

create index if not exists idx_uri on url using hash(uri);
create index if not exists idx_country_id on country(id);
create index if not exists idx_ip_url_id on "url-ip"(url_id);