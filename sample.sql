CREATE TABLE users
(
    id         INTEGER PRIMARY KEY,
    first_name TEXT NOT NULL,
    last_name  TEXT NOT NULL,
    email      TEXT NOT NULL UNIQUE
);

CREATE TABLE conversations
(
    id         INTEGER PRIMARY KEY,
    name       TEXT    NOT NULL,
    created_by INTEGER NOT NULL,
    foreign key (created_by) references users (id) ON DELETE CASCADE
);

CREATE TABLE chats
(
    id              INTEGER PRIMARY KEY,
    from_user_id    INTEGER NOT NULL,
    conversation_id INTEGER NOT NULL,
    message         TEXT    NOT NULL,
    foreign key (from_user_id) references users (id) ON DELETE CASCADE,
    foreign key (conversation_id) references conversations (id) ON DELETE CASCADE
);