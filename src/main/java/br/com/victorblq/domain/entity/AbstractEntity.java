package br.com.victorblq.domain.entity;

import java.io.Serializable;
import java.time.LocalDateTime;

import javax.persistence.Column;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.MappedSuperclass;
import javax.persistence.PrePersist;
import javax.persistence.PreUpdate;

import com.fasterxml.jackson.annotation.JsonIdentityInfo;
import com.fasterxml.jackson.annotation.ObjectIdGenerators;

import lombok.Data;
import lombok.NoArgsConstructor;

/**
 * 
 * @author Victor Carvalho
 *
 * @version 1.0.0
 * @since 1.0.0, Dec 19, 2018
 */
@Data
@NoArgsConstructor
@MappedSuperclass
@JsonIdentityInfo(generator = ObjectIdGenerators.UUIDGenerator.class, scope = AbstractEntity.class)
public abstract class AbstractEntity implements Serializable {
	
	@Id
	@GeneratedValue(strategy = GenerationType.IDENTITY)
	protected Long id;

	@Column(nullable = false, updatable = false)
	protected LocalDateTime created;

	@Column
	protected LocalDateTime updated;

	/**
	 * 
	 * @param id
	 */
	public AbstractEntity(Long id) {
		this.id = id;
	}

	/**
	 * 
	 */
	@PrePersist
	protected void refreshCreated() {
		this.created = LocalDateTime.now();
	}
	
	/**
	 * 
	 */
	@PreUpdate
	protected void refreshUpdated() {
		this.updated = LocalDateTime.now();
	}
}
