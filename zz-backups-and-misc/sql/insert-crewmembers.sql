insert into crewmember
    (
        first_name,
        last_name,
        address1,
        address2,
        city,
        state,
        zip,
        phone,
        display_email,
        email,
        certificate_no,
        notes,
        class,
        enabled,
        password,
        username
    )
values
    (
        'Cecily', 'Lyons','123 Main St. South', 'Suite A','St. Petersburg','FL', '33998', '123-456-6789', false, 'c.l.@m.com','123000-B', 'Notes placeholder', 'Class: WTF?', true, 'cl-password', 'cl-username'
    ),
    (
        'Rob', 'Gilchrist','235 Boulevard St. South', 'Suite A','London','FL', 'AB12', '999-456-6789', false, 'r.g.@mlb.com','qewrwe-B', 'Notes placeholder', 'Class: WTF?', true, 'rg-password', 'rg-username'

    ),
    (
        'Misa', 'Miguchi','123 Main St. South', 'Suite A','Nakajima','FL', 'AB-339', '666-456-6789', false, 'M.Y.@nippon.com','8976-B', 'Notes placeholder', 'Class: WTF?', true, 'my-password', 'my-username'

    );
