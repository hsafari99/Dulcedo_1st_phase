//-- EMBEDDINGS -//
Table contact {
  THIS IN 
  firstname str
  lastname str
  email str
  telephone str
  cellphone str
  address str
  zip str
  city str
  country_id str
}
Ref: contact.country_id < countries.id

Table guardian {
  THIS IN
  relation str
  contact Object
}
Ref: guardian.contact - contact.THIS

Table measurement {
  THIS IN
  eye_color str
  hair_color str
  height str
  waist str
  bust str
  hips str
  neck str
  jacket str
  sleeve str
  dress str
  shoe str
  inseam str
}

Table discovery {
  THIS IN
  source_id str
  detail str
  user_id id
  event_id id
  notes str
}
Ref: discovery.user_id < users.id
Ref: discovery.source_id < sources.id
Ref: discovery.event_id < events.id

Table votes {
  THOSE IN
  user_id id
  result str
}
Ref: votes.user_id < users.id

Table answers {
  THOSE IN
  question_id id
  text str
}
Ref: answers.question_id < questions.id

//-- COLLECTIONS --//
Table users {
  id id
  username str
  password str
  roles Array
  contact Object
}
Ref: users.contact - contact.THIS

Table questions {
  id id
  en str
  fr str
}

Table sources {
  id str
  en str
  fr str
}

Table countries {
  id str
  en str
  fr str
}

Table steps {
  id str
  en str
  fr str
}

Table events {
  id id
  date date
  name str
  desc str
}

Table talents {
  id id
  contact Object
  gender str
  sin str
}
Ref: talents.contact - contact.THIS

Table applications {
  id id
  step_id str 
  talent_id id
  notes str
  discovery Object
  answers Object_Array
  measurement Object
  guardian Object
  votes Object_Array
}
Ref: applications.talent_id < talents.id
Ref: applications.guardian - guardian.THIS
Ref: applications.votes < votes.THOSE
Ref: applications.measurement - measurement.THIS
Ref: applications.discovery - discovery.THIS
Ref: applications.answers < answers.THOSE
Ref: applications.step_id < steps.id