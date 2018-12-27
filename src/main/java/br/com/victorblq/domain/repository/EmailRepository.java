package br.com.victorblq.domain.repository;

import org.springframework.data.jpa.repository.JpaRepository;

import br.com.victorblq.domain.entity.personal_info.Email;

public interface EmailRepository extends JpaRepository<Email, Long>{

}
