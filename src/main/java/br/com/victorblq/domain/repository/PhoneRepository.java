package br.com.victorblq.domain.repository;

import org.springframework.data.jpa.repository.JpaRepository;

import br.com.victorblq.domain.entity.personal_info.Phone;

public interface PhoneRepository extends JpaRepository<Phone, Long>{

}
