-- tabla para los mensajes del board
-- correr en Supabase > SQL Editor

create table if not exists public.messages (
  id bigint generated always as identity primary key,
  user_id uuid not null default auth.uid() references auth.users(id) on delete cascade,
  subject text not null,
  name text not null,
  message text not null,
  created_at timestamptz not null default now()
);

alter table public.messages enable row level security;

-- cada usuario solo ve y crea sus propios mensajes
create policy "ver mis mensajes" on public.messages
  for select to authenticated
  using (auth.uid() = user_id);

create policy "crear mis mensajes" on public.messages
  for insert to authenticated
  with check (auth.uid() = user_id);
